export default () => ({
  bra: false,
  cat: false,
  loc: false,
  adm: false,

  toggleBra() {
    this.bra = !this.bra;
    this.cat = false;
    this.loc = false;
    this.adm = false;
  },
  toggleCat() {
    this.bra = false;
    this.cat = !this.cat;
    this.loc = false;
    this.adm = false;
  },
  toggleLoc() {
    this.bra = false;
    this.cat = false;
    this.loc = !this.loc;
    this.adm = false;
  },
  toggleAdm() {
    this.bra = false;
    this.cat = false;
    this.loc = false;
    this.adm = !this.adm;
  },
});
