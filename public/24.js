(window.webpackJsonp=window.webpackJsonp||[]).push([[24],{61:function(t,e,a){"use strict";a.r(e);var s=a(0);function i(t,e){var a=Object.keys(t);if(Object.getOwnPropertySymbols){var s=Object.getOwnPropertySymbols(t);e&&(s=s.filter((function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable}))),a.push.apply(a,s)}return a}function r(t){for(var e=1;e<arguments.length;e++){var a=null!=arguments[e]?arguments[e]:{};e%2?i(a,!0).forEach((function(e){o(t,e,a[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(a)):i(a).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(a,e))}))}return t}function o(t,e,a){return e in t?Object.defineProperty(t,e,{value:a,enumerable:!0,configurable:!0,writable:!0}):t[e]=a,t}var l={name:"DeliveryMethodPage",data:function(){return{formData:{id:"",delivery_title:"",min_time:"",max_time:"",cost_price:"",delivery_status:""},btnDisabled:!1,isedit:!1}},created:function(){this.getDeliveryMethodList()},methods:r({},Object(s.b)(["getDeliveryMethodList","storeDeliveryMethod","updateDeliveryMethodInfo","deleteDeliveryMethod"]),{manipulateDeliveryMethodData:function(){var t=this;!0===this.isedit?this.updateDeliveryMethodInfo(this.formData).then((function(e){void 0!==e.code&&200===e.code?(Notify.success(e.message),t.isedit=!1,t.formReset()):"validation"===e.status?Notify.validation(e.message):Notify.error(e.message)})).catch((function(t){Notify.info(t.message)})):this.storeDeliveryMethod(this.formData).then((function(e){console.log(e),"success"===e.status?(Notify.success(e.message),t.formReset()):"validation"===e.status?Notify.validation(e.message):Notify.error(e.message)})).catch((function(t){Notify.info(t.message)}))},formReset:function(){this.formData.delivery_title="",this.formData.min_time="",this.formData.max_time="",this.formData.cost_price="",this.formData.delivery_status=!1},deliveryMethodDelete:function(t){if(!confirm("Are You Sure..?"))return!1;this.deleteDeliveryMethod(t).then((function(t){"success"===t.status?Notify.success(t.message):Notify.error(t.message)}))},editDeliveryMethod:function(t){var e=this;this.deliveryMethods.filter((function(a){return a.id===t&&(e.isedit=!0,e.formData.id=a.id,e.formData.delivery_title=a.title,e.formData.min_time=a.min_days,e.formData.max_time=a.max_days,e.formData.cost_price=a.charge,e.formData.delivery_status=a.status),a}))}}),computed:r({},Object(s.c)(["deliveryMethods"]),{checkFormData:function(){return JSON.parse(JSON.stringify(this.formData))}}),watch:{checkFormData:{handler:function(t,e){e!==t&&(this.btnDisabled=!1)},deep:!0}}},n=a(2),c=Object(n.a)(l,(function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"content"},[a("div",{staticClass:"panel panel-info"},[t._m(0),t._v(" "),a("div",{staticClass:"panel-body"},[a("form",{attrs:{action:""},on:{submit:function(e){return e.preventDefault(),t.manipulateDeliveryMethodData(e)}}},[a("div",{staticClass:"row"},[a("div",{staticClass:"col-md-3"},[a("div",{staticClass:"form-group"},[t._m(1),t._v(" "),a("input",{directives:[{name:"model",rawName:"v-model",value:t.formData.delivery_title,expression:"formData.delivery_title"}],staticClass:"form-control",attrs:{type:"text",placeholder:"Delivery Method Title",required:""},domProps:{value:t.formData.delivery_title},on:{input:function(e){e.target.composing||t.$set(t.formData,"delivery_title",e.target.value)}}})])]),t._v(" "),a("div",{staticClass:"col-md-2"},[a("div",{staticClass:"form-group"},[t._m(2),t._v(" "),a("input",{directives:[{name:"model",rawName:"v-model",value:t.formData.min_time,expression:"formData.min_time"}],staticClass:"form-control",attrs:{type:"number",placeholder:"Min. Day(s)",required:""},domProps:{value:t.formData.min_time},on:{input:function(e){e.target.composing||t.$set(t.formData,"min_time",e.target.value)}}})])]),t._v(" "),a("div",{staticClass:"col-md-2"},[a("div",{staticClass:"form-group"},[t._m(3),t._v(" "),a("input",{directives:[{name:"model",rawName:"v-model",value:t.formData.max_time,expression:"formData.max_time"}],staticClass:"form-control",attrs:{type:"number",placeholder:"Max. Day(s)",required:""},domProps:{value:t.formData.max_time},on:{input:function(e){e.target.composing||t.$set(t.formData,"max_time",e.target.value)}}})])]),t._v(" "),a("div",{staticClass:"col-md-2"},[a("div",{staticClass:"form-group"},[t._m(4),t._v(" "),a("input",{directives:[{name:"model",rawName:"v-model",value:t.formData.cost_price,expression:"formData.cost_price"}],staticClass:"form-control",attrs:{type:"number",placeholder:"Delivery Charge",required:""},domProps:{value:t.formData.cost_price},on:{input:function(e){e.target.composing||t.$set(t.formData,"cost_price",e.target.value)}}})])]),t._v(" "),a("div",{staticClass:"col-md-2"},[a("div",{staticClass:"form-group"},[a("label",[t._v("Delivery Status:")]),t._v(" "),a("label",{staticClass:"checkbox-style",attrs:{for:"paypal_payment"}},[t.formData.delivery_status?a("span",{staticClass:"text-bold text-success"},[t._v("Active")]):a("span",{staticClass:"text-bold text-warning"},[t._v("Inactive")]),t._v(" "),a("input",{directives:[{name:"model",rawName:"v-model",value:t.formData.delivery_status,expression:"formData.delivery_status"}],attrs:{type:"checkbox",id:"paypal_payment"},domProps:{checked:t.formData.delivery_status,checked:Array.isArray(t.formData.delivery_status)?t._i(t.formData.delivery_status,null)>-1:t.formData.delivery_status},on:{change:function(e){var a=t.formData.delivery_status,s=e.target,i=!!s.checked;if(Array.isArray(a)){var r=t._i(a,null);s.checked?r<0&&t.$set(t.formData,"delivery_status",a.concat([null])):r>-1&&t.$set(t.formData,"delivery_status",a.slice(0,r).concat(a.slice(r+1)))}else t.$set(t.formData,"delivery_status",i)}}}),t._v(" "),a("span",{staticClass:"checkmark"})])]),t._v(" "),a("div",{staticClass:"text-right form-group"},[a("button",{staticClass:"btn btn-success",attrs:{type:"submit",disabled:t.btnDisabled}},[t.isedit?a("span",[t._v("Update Method")]):a("span",[t._v("Save Method")]),t._v(" "),a("i",{staticClass:"icon-arrow-right14 position-right"})])])])])])])]),t._v(" "),a("div",{staticClass:"panel panel-flat"},[t._m(5),t._v(" "),a("div",{staticClass:"table-responsive"},[a("table",{staticClass:"table table-bordered table-striped table-sm"},[t._m(6),t._v(" "),a("tbody",t._l(t.deliveryMethods,(function(e,s){return t.deliveryMethods?a("tr",{key:e.id},[a("td",[t._v(t._s(s+1))]),t._v(" "),a("td",[a("span",{staticClass:"text text-bold"},[t._v(" "+t._s(e.title))])]),t._v(" "),a("td",[a("span",{staticClass:"text text-bold"},[t._v(" "+t._s(e.min_days))])]),t._v(" "),a("td",[a("span",{staticClass:"text text-bold"},[t._v(" "+t._s(e.max_days))])]),t._v(" "),a("td",[a("span",{staticClass:"text text-bold"},[t._v(" "+t._s(e.charge))])]),t._v(" "),a("td",{staticClass:"text text-center"},[1===e.status?a("span",{staticClass:"badge badge-success"},[t._v("Active")]):a("span",{staticClass:"badge badge-warning"},[t._v("De-active")])]),t._v(" "),a("td",{staticClass:"text text-center"},[a("ul",{staticClass:"icons-list"},[a("li",{staticClass:"text-primary-600"},[a("a",{attrs:{href:"#"},on:{click:function(a){return a.preventDefault(),t.editDeliveryMethod(e.id)}}},[a("i",{staticClass:"icon-pencil7"})])]),t._v(" "),a("li",{staticClass:"text-danger-600"},[a("a",{attrs:{href:"#"},on:{click:function(a){return a.preventDefault(),t.deliveryMethodDelete(e.id)}}},[a("i",{staticClass:"icon-trash"})])])])])]):t._e()})),0)])])])])}),[function(){var t=this.$createElement,e=this._self._c||t;return e("div",{staticClass:"panel-heading"},[e("h5",{staticClass:"panel-title"},[this._v("Delivery Method")])])},function(){var t=this.$createElement,e=this._self._c||t;return e("label",[this._v("Delivery Title: "),e("span",{staticClass:"text text-bold text-danger"},[this._v("*")])])},function(){var t=this.$createElement,e=this._self._c||t;return e("label",[this._v("Min. Day(s): "),e("span",{staticClass:"text text-bold text-danger"},[this._v("*")])])},function(){var t=this.$createElement,e=this._self._c||t;return e("label",[this._v("Max. Day(s): "),e("span",{staticClass:"text text-bold text-danger"},[this._v("*")])])},function(){var t=this.$createElement,e=this._self._c||t;return e("label",[this._v("Delivery Change: "),e("span",{staticClass:"text text-bold text-danger"},[this._v("*")])])},function(){var t=this.$createElement,e=this._self._c||t;return e("div",{staticClass:"panel-heading"},[e("h5",{staticClass:"panel-title"},[this._v("Delivery Method List")])])},function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("thead",[a("tr",[a("th",[t._v("#")]),t._v(" "),a("th",[t._v("Delivery Title")]),t._v(" "),a("th",[t._v("Min. Day(s)")]),t._v(" "),a("th",[t._v("Max. Day(s)")]),t._v(" "),a("th",[t._v("Delivery charge")]),t._v(" "),a("th",{staticClass:"text-center"},[t._v("Status")]),t._v(" "),a("th",{staticClass:"text-center"},[t._v("Action")])])])}],!1,null,"6856195b",null);e.default=c.exports}}]);