/*!
 * Finder | Directory & Listings Bootstrap HTML Template
 * Copyright 2024 Createx Studio
 * Theme scripts
 *
 * @author Createx Studio
 * @version 2.0.0
 */

// Vendors
import * as bootstrap from 'bootstrap'
import Choices from 'choices.js'
import Cleave from 'cleave.js'
import flatpickr from 'flatpickr'
import GLightbox from 'glightbox'
import L from 'leaflet'
import List from 'list.js'
import noUiSlider from 'nouislider'
import SimpleBar from 'simplebar'
import Swiper from 'swiper/bundle'
import { timezz } from 'timezz'

// Expose vendors to window
window.bootstrap = bootstrap
window.Choices = Choices
window.Cleave = Cleave
window.flatpickr = flatpickr
window.GLightbox = GLightbox
window.L = L
window.List = List
window.noUiSlider = noUiSlider
window.SimpleBar = SimpleBar
window.Swiper = Swiper
window.timezz = timezz

// Components
import pwa from './components/pwa'
import stickyElement from './components/sticky-element'
import carousel from './components/carousel'
import lightbox from './components/lightbox'
import countdown from './components/countdown'
import rangeSlider from './components/range-slider'
import passwordToggle from './components/password-toggle'
import countInput from './components/count-input'
import inputFormatter from './components/input-formatter'
import formValidation from './components/form-validation'
import autofocus from './components/autofocus'
import scrollTopButton from './components/scroll-top-button'
import selectBox from './components/select-box'
import dropdownHover from './components/dropdown-hover'
import tooltip from './components/tooltip'
import popover from './components/popover'
import filterList from './components/filter-list'
import datePicker from './components/date-picker'
import masterCheckbox from './components/master-checkbox'
import bindedLabel from './components/binded-label'
import map from './components/map'
import codeHighlight from './components/code-highlight'
import copyText from './components/copy-text'

// Initialize components
pwa()
stickyElement()
carousel()
lightbox()
countdown()
rangeSlider()
passwordToggle()
countInput()
inputFormatter()
formValidation()
autofocus()
scrollTopButton()
selectBox()
dropdownHover()
tooltip()
popover()
filterList()
datePicker()
masterCheckbox()
bindedLabel()
map()
codeHighlight()
copyText()
