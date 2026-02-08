@props(['id'])

<span aria-live="assertive" id="{{ $id }}-error" class="elements__form-items__error-message pl-1 mt-1 text-xs text-danger">{{ $slot }}</span>
