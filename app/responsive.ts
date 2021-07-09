function boot(): void {
  const nojs =  document.querySelector('#ske.no-js.doc')
  if(nojs) nojs.classList.replace('no-js', 'js')
}
