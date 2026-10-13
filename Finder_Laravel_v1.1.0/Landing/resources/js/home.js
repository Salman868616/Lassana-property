// Only the interactive components used by the homepage.
import * as bootstrap from 'bootstrap'
import Swiper from 'swiper'
import { Pagination, Keyboard, Autoplay } from 'swiper/modules'
import noUiSlider from 'nouislider'
import pwa from './components/pwa'
import stickyElement from './components/sticky-element'
import carousel from './components/carousel'
import latestPropertiesAutoplay from './components/latest-properties-autoplay'
import rangeSlider from './components/range-slider'
import scrollTopButton from './components/scroll-top-button'
import dropdownHover from './components/dropdown-hover'

Swiper.use([Pagination, Keyboard, Autoplay])
window.bootstrap = bootstrap
window.Swiper = Swiper
window.noUiSlider = noUiSlider
pwa()
stickyElement()
carousel()
latestPropertiesAutoplay()
rangeSlider()
scrollTopButton()
dropdownHover()
