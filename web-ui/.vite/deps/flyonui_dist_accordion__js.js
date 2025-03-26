import {
  __commonJS
} from "./chunk-HKJ2B2AA.js";

// node_modules/flyonui/dist/accordion.js
var require_accordion = __commonJS({
  "node_modules/flyonui/dist/accordion.js"(exports, module) {
    !function(e, t) {
      if ("object" == typeof exports && "object" == typeof module) module.exports = t();
      else if ("function" == typeof define && define.amd) define([], t);
      else {
        var o = t();
        for (var i in o) ("object" == typeof exports ? exports : e)[i] = o[i];
      }
    }(self, () => (() => {
      "use strict";
      var e = { 287: (e2, t2) => {
        Object.defineProperty(t2, "__esModule", { value: true });
        t2.default = class {
          constructor(e3, t3, o2) {
            this.el = e3, this.options = t3, this.events = o2, this.el = e3, this.options = t3, this.events = {};
          }
          createCollection(e3, t3) {
            var o2;
            e3.push({ id: (null === (o2 = null == t3 ? void 0 : t3.el) || void 0 === o2 ? void 0 : o2.id) || e3.length + 1, element: t3 });
          }
          fireEvent(e3, t3 = null) {
            if (this.events.hasOwnProperty(e3)) return this.events[e3](t3);
          }
          on(e3, t3) {
            this.events[e3] = t3;
          }
        };
      }, 306: function(e2, t2, o2) {
        var i = this && this.__importDefault || function(e3) {
          return e3 && e3.__esModule ? e3 : { default: e3 };
        };
        Object.defineProperty(t2, "__esModule", { value: true });
        const n = o2(806), s = i(o2(287));
        class l extends s.default {
          constructor(e3, t3, o3) {
            super(e3, t3, o3), this.toggle = this.el.querySelector(".accordion-toggle") || null, this.content = this.el.querySelector(".accordion-content") || null, this.group = this.el.closest(".accordion") || null, this.update(), this.isToggleStopPropagated = (0, n.stringToBoolean)((0, n.getClassProperty)(this.toggle, "--stop-propagation", "false") || "false"), this.keepOneOpen = !!this.group && (0, n.stringToBoolean)((0, n.getClassProperty)(this.group, "--keep-one-open", "false") || "false"), this.toggle && this.content && this.init();
          }
          init() {
            this.createCollection(window.$hsAccordionCollection, this), this.onToggleClickListener = (e3) => this.toggleClick(e3), this.toggle.addEventListener("click", this.onToggleClickListener);
          }
          toggleClick(e3) {
            if (this.el.classList.contains("active") && this.keepOneOpen) return false;
            this.isToggleStopPropagated && e3.stopPropagation(), this.el.classList.contains("active") ? this.hide() : this.show();
          }
          show() {
            var e3;
            if (this.group && !this.isAlwaysOpened && this.group.querySelector(":scope > .accordion-item.active") && this.group.querySelector(":scope > .accordion-item.active") !== this.el) {
              window.$hsAccordionCollection.find((e4) => e4.element.el === this.group.querySelector(":scope > .accordion-item.active")).element.hide();
            }
            if (this.el.classList.contains("active")) return false;
            this.el.classList.add("active"), (null === (e3 = null == this ? void 0 : this.toggle) || void 0 === e3 ? void 0 : e3.ariaExpanded) && (this.toggle.ariaExpanded = "true"), this.fireEvent("beforeOpen", this.el), (0, n.dispatch)("beforeOpen.accordion.item", this.el, this.el), this.content.style.display = "block", this.content.style.height = "0", setTimeout(() => {
              this.content.style.height = `${this.content.scrollHeight}px`, (0, n.afterTransition)(this.content, () => {
                this.content.style.display = "block", this.content.style.height = "", this.fireEvent("open", this.el), (0, n.dispatch)("open.accordion.item", this.el, this.el);
              });
            });
          }
          hide() {
            var e3;
            if (!this.el.classList.contains("active")) return false;
            this.el.classList.remove("active"), (null === (e3 = null == this ? void 0 : this.toggle) || void 0 === e3 ? void 0 : e3.ariaExpanded) && (this.toggle.ariaExpanded = "false"), this.fireEvent("beforeClose", this.el), (0, n.dispatch)("beforeClose.accordion.item", this.el, this.el), this.content.style.height = `${this.content.scrollHeight}px`, setTimeout(() => {
              this.content.style.height = "0";
            }), (0, n.afterTransition)(this.content, () => {
              this.content.style.display = "none", this.content.style.height = "", this.fireEvent("close", this.el), (0, n.dispatch)("close.accordion.item", this.el, this.el);
            });
          }
          update() {
            if (this.group = this.el.closest(".accordion") || null, !this.group) return false;
            this.isAlwaysOpened = this.group.hasAttribute("data-accordion-always-open") || false, window.$hsAccordionCollection.map((e3) => (e3.id === this.el.id && (e3.element.group = this.group, e3.element.isAlwaysOpened = this.isAlwaysOpened), e3));
          }
          destroy() {
            var e3;
            (null === (e3 = null == l ? void 0 : l.selectable) || void 0 === e3 ? void 0 : e3.length) && l.selectable.forEach((e4) => {
              e4.listeners.forEach(({ el: e5, listener: t3 }) => {
                e5.removeEventListener("click", t3);
              });
            }), this.onToggleClickListener && this.toggle.removeEventListener("click", this.onToggleClickListener), this.toggle = null, this.content = null, this.group = null, this.onToggleClickListener = null, window.$hsAccordionCollection = window.$hsAccordionCollection.filter(({ element: e4 }) => e4.el !== this.el);
          }
          static findInCollection(e3) {
            return window.$hsAccordionCollection.find((t3) => e3 instanceof l ? t3.element.el === e3.el : "string" == typeof e3 ? t3.element.el === document.querySelector(e3) : t3.element.el === e3) || null;
          }
          static autoInit() {
            window.$hsAccordionCollection || (window.$hsAccordionCollection = []), window.$hsAccordionCollection && (window.$hsAccordionCollection = window.$hsAccordionCollection.filter(({ element: e3 }) => document.contains(e3.el))), document.querySelectorAll(".accordion-item:not(.--prevent-on-load-init)").forEach((e3) => {
              window.$hsAccordionCollection.find((t3) => {
                var o3;
                return (null === (o3 = null == t3 ? void 0 : t3.element) || void 0 === o3 ? void 0 : o3.el) === e3;
              }) || new l(e3);
            });
          }
          static getInstance(e3, t3) {
            const o3 = window.$hsAccordionCollection.find((t4) => t4.element.el === ("string" == typeof e3 ? document.querySelector(e3) : e3));
            return o3 ? t3 ? o3 : o3.element.el : null;
          }
          static show(e3) {
            const t3 = l.findInCollection(e3);
            t3 && "block" !== t3.element.content.style.display && t3.element.show();
          }
          static hide(e3) {
            const t3 = l.findInCollection(e3), o3 = t3 ? window.getComputedStyle(t3.element.content) : null;
            t3 && "none" !== o3.display && t3.element.hide();
          }
          static treeView() {
            if (!document.querySelectorAll(".accordion-treeview-root").length) return false;
            this.selectable = [], document.querySelectorAll(".accordion-treeview-root").forEach((e3) => {
              const t3 = null == e3 ? void 0 : e3.getAttribute("data-accordion-options"), o3 = t3 ? JSON.parse(t3) : {};
              this.selectable.push({ el: e3, options: Object.assign({}, o3), listeners: [] });
            }), this.selectable.length && this.selectable.forEach((e3) => {
              const { el: t3 } = e3;
              t3.querySelectorAll(".accordion-selectable").forEach((t4) => {
                const o3 = (o4) => this.onSelectableClick(o4, e3, t4);
                t4.addEventListener("click", o3), e3.listeners.push({ el: t4, listener: o3 });
              });
            });
          }
          static toggleSelected(e3, t3) {
            t3.classList.contains("selected") ? t3.classList.remove("selected") : (e3.el.querySelectorAll(".accordion-selectable").forEach((e4) => e4.classList.remove("selected")), t3.classList.add("selected"));
          }
          static on(e3, t3, o3) {
            const i2 = l.findInCollection(t3);
            i2 && (i2.element.events[e3] = o3);
          }
        }
        l.onSelectableClick = (e3, t3, o3) => {
          e3.stopPropagation(), l.toggleSelected(t3, o3);
        }, window.addEventListener("load", () => {
          l.autoInit(), document.querySelectorAll(".accordion-treeview-root").length && l.treeView();
        }), "undefined" != typeof window && (window.HSAccordion = l), t2.default = l;
      }, 806: function(e2, t2) {
        Object.defineProperty(t2, "__esModule", { value: true }), t2.menuSearchHistory = t2.classToClassList = t2.htmlToElement = t2.afterTransition = t2.dispatch = t2.debounce = t2.isScrollable = t2.isParentOrElementHidden = t2.isJson = t2.isIpadOS = t2.isIOS = t2.isDirectChild = t2.isFormElement = t2.isFocused = t2.isEnoughSpace = t2.getHighestZIndex = t2.getZIndex = t2.getClassPropertyAlt = t2.getClassProperty = t2.stringToBoolean = void 0;
        t2.stringToBoolean = (e3) => "true" === e3;
        t2.getClassProperty = (e3, t3, o3 = "") => (window.getComputedStyle(e3).getPropertyValue(t3) || o3).replace(" ", "");
        t2.getClassPropertyAlt = (e3, t3, o3 = "") => {
          let i2 = "";
          return e3.classList.forEach((e4) => {
            e4.includes(t3) && (i2 = e4);
          }), i2.match(/:(.*)]/) ? i2.match(/:(.*)]/)[1] : o3;
        };
        const o2 = (e3) => window.getComputedStyle(e3).getPropertyValue("z-index");
        t2.getZIndex = o2;
        t2.getHighestZIndex = (e3) => {
          let t3 = Number.NEGATIVE_INFINITY;
          return e3.forEach((e4) => {
            let i2 = o2(e4);
            "auto" !== i2 && (i2 = parseInt(i2, 10), i2 > t3 && (t3 = i2));
          }), t3;
        };
        t2.isDirectChild = (e3, t3) => {
          const o3 = e3.children;
          for (let e4 = 0; e4 < o3.length; e4++) if (o3[e4] === t3) return true;
          return false;
        };
        t2.isEnoughSpace = (e3, t3, o3 = "auto", i2 = 10, n2 = null) => {
          const s = t3.getBoundingClientRect(), l = n2 ? n2.getBoundingClientRect() : null, r = window.innerHeight, c = l ? s.top - l.top : s.top, a = (n2 ? l.bottom : r) - s.bottom, d = e3.clientHeight + i2;
          return "bottom" === o3 ? a >= d : "top" === o3 ? c >= d : c >= d || a >= d;
        };
        t2.isFocused = (e3) => document.activeElement === e3;
        t2.isFormElement = (e3) => e3 instanceof HTMLInputElement || e3 instanceof HTMLTextAreaElement || e3 instanceof HTMLSelectElement;
        t2.isIOS = () => !!/iPad|iPhone|iPod/.test(navigator.platform) || navigator.maxTouchPoints && navigator.maxTouchPoints > 2 && /MacIntel/.test(navigator.platform);
        t2.isIpadOS = () => navigator.maxTouchPoints && navigator.maxTouchPoints > 2 && /MacIntel/.test(navigator.platform);
        t2.isJson = (e3) => {
          if ("string" != typeof e3) return false;
          const t3 = e3.trim()[0], o3 = e3.trim().slice(-1);
          if ("{" === t3 && "}" === o3 || "[" === t3 && "]" === o3) try {
            return JSON.parse(e3), true;
          } catch (e4) {
            return false;
          }
          return false;
        };
        const i = (e3) => {
          if (!e3) return false;
          return "none" === window.getComputedStyle(e3).display || i(e3.parentElement);
        };
        t2.isParentOrElementHidden = i;
        t2.isScrollable = (e3) => {
          const t3 = window.getComputedStyle(e3), o3 = t3.overflowY, i2 = t3.overflowX, n2 = ("scroll" === o3 || "auto" === o3) && e3.scrollHeight > e3.clientHeight, s = ("scroll" === i2 || "auto" === i2) && e3.scrollWidth > e3.clientWidth;
          return n2 || s;
        };
        t2.debounce = (e3, t3 = 200) => {
          let o3;
          return (...i2) => {
            clearTimeout(o3), o3 = setTimeout(() => {
              e3.apply(this, i2);
            }, t3);
          };
        };
        t2.dispatch = (e3, t3, o3 = null) => {
          const i2 = new CustomEvent(e3, { detail: { payload: o3 }, bubbles: true, cancelable: true, composed: false });
          t3.dispatchEvent(i2);
        };
        t2.afterTransition = (e3, t3) => {
          const o3 = () => {
            t3(), e3.removeEventListener("transitionend", o3, true);
          }, i2 = window.getComputedStyle(e3), n2 = i2.getPropertyValue("transition-duration");
          "none" !== i2.getPropertyValue("transition-property") && parseFloat(n2) > 0 ? e3.addEventListener("transitionend", o3, true) : t3();
        };
        t2.htmlToElement = (e3) => {
          const t3 = document.createElement("template");
          return e3 = e3.trim(), t3.innerHTML = e3, t3.content.firstChild;
        };
        t2.classToClassList = (e3, t3, o3 = " ", i2 = "add") => {
          e3.split(o3).forEach((e4) => "add" === i2 ? t3.classList.add(e4) : t3.classList.remove(e4));
        };
        const n = { historyIndex: -1, addHistory(e3) {
          this.historyIndex = e3;
        }, existsInHistory(e3) {
          return e3 > this.historyIndex;
        }, clearHistory() {
          this.historyIndex = -1;
        } };
        t2.menuSearchHistory = n;
      } }, t = {};
      var o = function o2(i) {
        var n = t[i];
        if (void 0 !== n) return n.exports;
        var s = t[i] = { exports: {} };
        return e[i].call(s.exports, s, s.exports, o2), s.exports;
      }(306);
      return o;
    })());
  }
});
export default require_accordion();
/*! Bundled license information:

flyonui/dist/accordion.js:
  (*
   * HSAccordion
   * @version: 3.0.0
   * @author: Preline Labs Ltd.
   * @license: Licensed under MIT and Preline UI Fair Use License (https://preline.co/docs/license.html)
   * Copyright 2024 Preline Labs Ltd.
   *)
  (*
   * @version: 3.0.0
   * @author: Preline Labs Ltd.
   * @license: Licensed under MIT and Preline UI Fair Use License (https://preline.co/docs/license.html)
   * Copyright 2024 Preline Labs Ltd.
   *)
*/
//# sourceMappingURL=flyonui_dist_accordion__js.js.map
