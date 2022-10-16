"use strict";(self.webpackChunk_am5=self.webpackChunk_am5||[]).push([[476],{1790:function(e,t,a){a.r(t),a.d(t,{SliceGrouper:function(){return u}});var i=a(5125),o=a(8054),r=a(1479),n=a(6331),s=a(5071),u=function(e){function t(){var t=null!==e&&e.apply(this,arguments)||this;return Object.defineProperty(t,"zoomOutButton",{enumerable:!0,configurable:!0,writable:!0,value:void 0}),t}return(0,i.ZT)(t,e),Object.defineProperty(t.prototype,"_afterNew",{enumerable:!1,configurable:!0,writable:!0,value:function(){e.prototype._afterNew.call(this),this._setRawDefault("threshold",5),this._setRawDefault("groupName","Other"),this._setRawDefault("clickBehavior","none"),this.initZoomButton(),this._root.addDisposer(this)}}),Object.defineProperty(t.prototype,"initZoomButton",{enumerable:!1,configurable:!0,writable:!0,value:function(){var e=this;if("none"!==this.get("clickBehavior")){var t=this.root.tooltipContainer;this.zoomOutButton=t.children.push(o.z.new(this._root,{themeTags:["zoom"],icon:r.T.new(this._root,{themeTags:["button","icon"]})})),this.zoomOutButton.hide(),this.zoomOutButton.events.on("click",(function(){e.zoomOut()}))}}}),Object.defineProperty(t.prototype,"handleData",{enumerable:!1,configurable:!0,writable:!0,value:function(){var e=this,t=this.get("series");if(t){var a=this.getPrivate("groupDataItem");if(!a){var i=this.get("legend"),o=t.get("categoryField","category"),r=t.get("valueField","value"),n={};n[o]=this.get("groupName",""),n[r]=0,t.data.push(n),(a=t.dataItems[t.dataItems.length-1]).get("slice").events.on("click",(function(){e.handleClick()})),this.setPrivate("groupDataItem",a),i&&(i.data.push(a),a.on("visible",(function(t){t&&e.zoomOut()})))}var u=this.get("threshold",0),l=this.get("limit",1e3),h=[],c=[],g=0;(u||l)&&(s.each(t.dataItems,(function(e,t){var i=e.get("legendDataItem");(e.get("valuePercentTotal")<=u||t>l-1)&&a!==e?(g+=e.get("value",0),c.push(e),e.hide(0),i&&i.get("itemContainer").hide(0)):(h.push(e),i&&i.get("itemContainer").show(0))})),this.setPrivate("normalDataItems",h),this.setPrivate("smallDataItems",c),this.updateGroupDataItem(g))}}}),Object.defineProperty(t.prototype,"zoomOut",{enumerable:!1,configurable:!0,writable:!0,value:function(){var e=this.getPrivate("groupDataItem");if(e&&e.show(),"zoom"==this.get("clickBehavior")){var t=this.getPrivate("normalDataItems",[]);s.each(t,(function(e,t){e.show()}))}var a=this.getPrivate("smallDataItems",[]);s.each(a,(function(e,t){e.hide()})),this.zoomOutButton&&this.zoomOutButton.hide()}}),Object.defineProperty(t.prototype,"updateGroupDataItem",{enumerable:!1,configurable:!0,writable:!0,value:function(e){var t=this.get("series");if(t){var a={},i=t.get("categoryField","category"),o=t.get("valueField","value");a[i]=this.get("groupName",""),a[o]=e,t.data.setIndex(t.data.length-1,a);var r=this.getPrivate("groupDataItem");0==e?r.hide(0):r.isHidden()&&r.show(),"none"!=this.get("clickBehavior")&&r.get("slice").set("toggleKey","none")}}}),Object.defineProperty(t.prototype,"handleClick",{enumerable:!1,configurable:!0,writable:!0,value:function(){var e=this.get("clickBehavior"),t=this.getPrivate("smallDataItems");if(!("none"==e||t&&0==t.length)){var a=this.get("series");this.getPrivate("groupDataItem").hide(),s.each(a.dataItems,(function(a){-1!==t.indexOf(a)?a.show():"zoom"==e&&a.hide()})),this.zoomOutButton.show()}}}),Object.defineProperty(t.prototype,"_beforeChanged",{enumerable:!1,configurable:!0,writable:!0,value:function(){var t=this;if(e.prototype._beforeChanged.call(this),this.isDirty("series")){var a=this.get("series");a&&a.events.on("datavalidated",(function(e){t.handleData()}))}}}),Object.defineProperty(t,"className",{enumerable:!0,configurable:!0,writable:!0,value:"SliceGrouper"}),Object.defineProperty(t,"classNames",{enumerable:!0,configurable:!0,writable:!0,value:n.JH.classNames.concat([t.className])}),t}(n.JH)},9523:function(e,t,a){a.r(t),a.d(t,{am5plugins_sliceGrouper:function(){return i}});const i=a(1790)}},function(e){var t=(9523,e(e.s=9523)),a=window;for(var i in t)a[i]=t[i];t.__esModule&&Object.defineProperty(a,"__esModule",{value:!0})}]);
//# sourceMappingURL=sliceGrouper.js.map