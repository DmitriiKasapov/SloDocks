export default () => ({
  time: {
    days: 1,
    hours: 0,
    min: 0,
    sec: 0
  },
  endDate: '',
  localization: {
    days: ['dni', 'dan', 'dni', 'dni'],
    hours: ['ur', 'ura', 'uri', 'ure'],
    min: ['min', 'min', 'min', 'min'],
    sec: ['sek', 'sek', 'sek', 'sek',]
  },
  getLocalization ( id, time ) {
    switch( time ) {
      case 1: return this.localization[id][time]
      case 2: return this.localization[id][time]
      case (0 < time < 6): return this.localization[id][time]
      default: return this.localization[id][0]
    }
  },
  setTime ( date ) {
    const delta = ( date - ( new Date().getTime() )) / 1000
    this.time.sec = Math.floor(( delta ) % 60);
    this.time.min = Math.floor(( delta / 60 ) % 60 );
    this.time.hours = Math.floor((( delta ) / 3600 ) % 24 );
    this.time.days = Math.floor((( delta ) / 86400 ));
  },
  init() {
    setInterval(() => this.setTime(new Date( parseInt(this.endDate.toString().padEnd(13, '0')) ).getTime()), 100)
  }
})
