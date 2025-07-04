import "htmx.org";
import Alpine from "alpinejs";
import collapse from "@alpinejs/collapse";

import "./main.scss";
import settingView from "./scripts/settingView.js";

Alpine.plugin(collapse);
Alpine.data("settingView", settingView);
Alpine.start();
