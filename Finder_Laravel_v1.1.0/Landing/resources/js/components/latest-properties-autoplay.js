// Automatic movement is limited to the homepage's latest-property cards.
export default () => {
  const carousel = document.querySelector('#latest-properties-carousel')
  const swiper = carousel?.swiper
  if (!swiper?.autoplay) return

  const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)')
  let hovered = false
  let focused = false

  const sync = () => {
    const canAdvance = !swiper.isLocked && swiper.slides.length > Number(swiper.params.slidesPerView)
    const shouldPlay = canAdvance && !reducedMotion.matches && !hovered && !focused && !document.hidden

    swiper.params.speed = reducedMotion.matches ? 0 : 450

    if (shouldPlay) {
      if (!swiper.autoplay.running) swiper.autoplay.start()
    } else {
      swiper.autoplay.stop()
    }
  }

  // Turn around at each end so autoplay visits adjacent cards in both directions.
  swiper.on('reachEnd', () => {
    swiper.params.autoplay.reverseDirection = true
  })
  swiper.on('reachBeginning', () => {
    swiper.params.autoplay.reverseDirection = false
  })

  carousel.addEventListener('pointerenter', event => {
    if (event.pointerType !== 'mouse') return
    hovered = true
    sync()
  })
  carousel.addEventListener('pointerleave', event => {
    if (event.pointerType !== 'mouse') return
    hovered = false
    sync()
  })
  carousel.addEventListener('focusin', () => {
    focused = true
    sync()
  })
  carousel.addEventListener('focusout', event => {
    focused = carousel.contains(event.relatedTarget)
    sync()
  })
  reducedMotion.addEventListener('change', sync)
  document.addEventListener('visibilitychange', sync)
  swiper.on('lock unlock breakpoint', sync)
  sync()
}
