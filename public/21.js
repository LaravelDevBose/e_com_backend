(window.webpackJsonp=window.webpackJsonp||[]).push([[21],{57:function(t,e,a){"use strict";a.r(e);var s=a(0);function r(t,e){var a=Object.keys(t);if(Object.getOwnPropertySymbols){var s=Object.getOwnPropertySymbols(t);e&&(s=s.filter((function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable}))),a.push.apply(a,s)}return a}function i(t){for(var e=1;e<arguments.length;e++){var a=null!=arguments[e]?arguments[e]:{};e%2?r(a,!0).forEach((function(e){o(t,e,a[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(a)):r(a).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(a,e))}))}return t}function o(t,e,a){return e in t?Object.defineProperty(t,e,{value:a,enumerable:!0,configurable:!0,writable:!0}):t[e]=a,t}var l={name:"SliderEditPage",components:{ImageCropper:a(5).default},props:{id:[Number]},data:function(){return{formData:{id:"",slider_title:"",sub_title:"",btn_text:"",btn_url:"",slider_position:"",attachmentIds:"",slider_status:0},cropperData:{width:712,height:480,placeholder:"Choose a image in 712X480",file_size:1.5,init_image:"",folder:"slider",modal_type:3},removeImage:!1,btnDisabled:!1}},created:function(){this.getSlider(this.id)},methods:i({},Object(s.b)(["updateSlider","getSlider"]),{sliderUpdate:function(){var t=this;this.btnDisabled=!0;var e=this;e.cropImageIds.length>0&&(e.formData.attachmentIds=e.cropImageIds),e.updateSlider(e.formData).then((function(e){"success"===e.status?(Notify.success(e.message),t.removeImage=!0,e.hasOwnProperty("url")?setTimeout((function(){location.href=e.url})):location.reload()):Notify.warning(e.message)}))}}),computed:i({},Object(s.c)(["cropImageIds","sliderData"]),{sliderDataCheck:function(){return JSON.parse(JSON.stringify(this.sliderData))}}),watch:{formData:{handler:function(t,e){e===t&&(this.btnDisabled=!1)},deep:!0},sliderDataCheck:{handler:function(t,e){e!==t&&(this.formData.id=this.sliderData.slider_id,this.formData.slider_title=this.sliderData.slider_title,this.formData.slider_position=this.sliderData.slider_position,this.formData.slider_status=this.sliderData.slider_status)},deep:!0}}},n=a(2),d=Object(n.a)(l,(function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"content"},[a("div",{staticClass:"panel panel-info"},[t._m(0),t._v(" "),a("div",{staticClass:"panel-body"},[a("form",{attrs:{action:""},on:{submit:function(e){return e.preventDefault(),t.sliderUpdate(e)}}},[a("div",{staticClass:"row"},[a("div",{staticClass:"col-md-5 col-md-offset-1"},[a("div",{staticClass:"form-group"},[a("label",[t._v("Slider Title:")]),t._v(" "),a("input",{directives:[{name:"model",rawName:"v-model",value:t.formData.slider_title,expression:"formData.slider_title"}],staticClass:"form-control",attrs:{type:"text",placeholder:"Slider Title",required:""},domProps:{value:t.formData.slider_title},on:{input:function(e){e.target.composing||t.$set(t.formData,"slider_title",e.target.value)}}})]),t._v(" "),a("div",{staticClass:"form-group"},[a("label",[t._v("Slider Image:")]),t._v(" "),a("image-cropper",{attrs:{cropperData:t.cropperData,removeImage:t.removeImage}}),t._v(" "),a("img",{staticStyle:{"max-width":"450px","max-height":"250px",padding:"10px"},attrs:{src:t.sliderData.attachment.image_path}})],1)]),t._v(" "),a("div",{staticClass:"col-md-5"},[a("div",{staticClass:"form-group"},[a("label",[t._v("Slider Position:")]),t._v(" "),a("input",{directives:[{name:"model",rawName:"v-model",value:t.formData.slider_position,expression:"formData.slider_position"}],staticClass:"form-control",attrs:{type:"number",placeholder:"Slider Position",required:""},domProps:{value:t.formData.slider_position},on:{input:function(e){e.target.composing||t.$set(t.formData,"slider_position",e.target.value)}}})]),t._v(" "),a("div",{staticClass:"content-group-lg"},[a("label",[t._v("Slider Status:")]),t._v(" "),a("div",{staticClass:"form-group"},[a("label",{staticClass:"checkbox-style",attrs:{for:"paypal_payment"}},[t.formData.slider_status?a("span",{staticClass:"text-bold text-success"},[t._v("Active")]):a("span",{staticClass:"text-bold text-warning"},[t._v("Inactive")]),t._v(" "),a("input",{directives:[{name:"model",rawName:"v-model",value:t.formData.slider_status,expression:"formData.slider_status"}],attrs:{type:"checkbox",id:"paypal_payment"},domProps:{checked:t.formData.slider_status,checked:Array.isArray(t.formData.slider_status)?t._i(t.formData.slider_status,null)>-1:t.formData.slider_status},on:{change:function(e){var a=t.formData.slider_status,s=e.target,r=!!s.checked;if(Array.isArray(a)){var i=t._i(a,null);s.checked?i<0&&t.$set(t.formData,"slider_status",a.concat([null])):i>-1&&t.$set(t.formData,"slider_status",a.slice(0,i).concat(a.slice(i+1)))}else t.$set(t.formData,"slider_status",r)}}}),t._v(" "),a("span",{staticClass:"checkmark"})])])]),t._v(" "),a("div",{staticClass:"form-group"},[a("button",{staticClass:"btn btn-primary btn-block",attrs:{type:"submit",disabled:t.btnDisabled}},[t._v("Save Slider "),a("i",{staticClass:"icon-arrow-right14 position-right"})])])])])])])])])}),[function(){var t=this.$createElement,e=this._self._c||t;return e("div",{staticClass:"panel-heading"},[e("h5",{staticClass:"panel-title"},[this._v("Update Slider Details")])])}],!1,null,"5b424cbe",null);e.default=d.exports}}]);