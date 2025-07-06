import 'htmx.org'
import Alpine from 'alpinejs'
import collapse from '@alpinejs/collapse'

import './main.scss'
import settingView from './scripts/settingView.js'
import aduanView from './scripts/aduanView.js'

Alpine.plugin(collapse)
Alpine.data('settingView', settingView)
Alpine.data('aduanView', aduanView)
Alpine.start()
