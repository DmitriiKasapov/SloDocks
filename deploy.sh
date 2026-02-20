#!/bin/bash
# Deploy script for SloDocs
# Usage: ./deploy.sh [staging|production]
# TODO: set APP_DIR to actual path on VPS before first use

set -e

# ── Colors ────────────────────────────────────────────────────────────────────
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
CYAN='\033[0;36m'
NC='\033[0m'

step()  { echo -e "\n${CYAN}▶ $1${NC}"; }
ok()    { echo -e "${GREEN}✓ $1${NC}"; }
warn()  { echo -e "${YELLOW}⚠ $1${NC}"; }
fail()  { echo -e "${RED}✗ $1${NC}"; exit 1; }

# ── Config ────────────────────────────────────────────────────────────────────
ENV=${1:-staging}
APP_DIR="/var/www/slodocs"          # TODO: update if path differs on server
BRANCH="master"                     # TODO: change to "develop" for staging if needed

if [[ "$ENV" == "production" ]]; then
    BRANCH="master"
elif [[ "$ENV" == "staging" ]]; then
    BRANCH="develop"
else
    fail "Unknown environment: $ENV. Use: staging | production"
fi

echo -e "${CYAN}════════════════════════════════════════${NC}"
echo -e "${CYAN}  SloDocs Deploy → ${ENV} (${BRANCH})${NC}"
echo -e "${CYAN}════════════════════════════════════════${NC}"

# ── Safety check ─────────────────────────────────────────────────────────────
if [[ "$ENV" == "production" ]]; then
    warn "Deploying to PRODUCTION. Press Enter to continue or Ctrl+C to abort."
    read -r
fi

cd "$APP_DIR" || fail "Cannot cd to $APP_DIR"

# ── 1. Pull latest code ───────────────────────────────────────────────────────
step "Pulling code from git ($BRANCH)"
git fetch origin
git checkout "$BRANCH"
git pull origin "$BRANCH"
ok "Code updated"

# ── 2. PHP dependencies ───────────────────────────────────────────────────────
step "Installing PHP dependencies"
composer install --no-dev --optimize-autoloader --no-interaction
ok "Composer done"

# ── 3. Frontend assets ───────────────────────────────────────────────────────
step "Building frontend assets"
npm ci --silent
npm run build
ok "Assets built"

# ── 4. Database migrations ───────────────────────────────────────────────────
step "Running migrations"
php artisan migrate --force
ok "Migrations done"

# ── 5. Artisan cache ─────────────────────────────────────────────────────────
step "Caching config, routes, views"
php artisan config:cache
php artisan route:cache
php artisan view:cache
ok "Cache refreshed"

# ── 6. Queue restart ─────────────────────────────────────────────────────────
step "Restarting queue worker"
php artisan queue:restart
ok "Queue worker signaled to restart"

# ── 7. Nginx reload ──────────────────────────────────────────────────────────
step "Reloading Nginx"
sudo systemctl reload nginx
ok "Nginx reloaded"

# ── Done ─────────────────────────────────────────────────────────────────────
echo -e "\n${GREEN}════════════════════════════════════════${NC}"
echo -e "${GREEN}  Deploy complete! ✓${NC}"
echo -e "${GREEN}════════════════════════════════════════${NC}"
echo ""
echo "Next steps:"
echo "  1. Open the site and check it loads"
echo "  2. tail -f $APP_DIR/storage/logs/laravel.log"
echo "  3. php artisan queue:failed"
