parcelRequire=function(e,r,t,n){var i,o="function"==typeof parcelRequire&&parcelRequire,u="function"==typeof require&&require;function f(t,n){if(!r[t]){if(!e[t]){var i="function"==typeof parcelRequire&&parcelRequire;if(!n&&i)return i(t,!0);if(o)return o(t,!0);if(u&&"string"==typeof t)return u(t);var c=new Error("Cannot find module '"+t+"'");throw c.code="MODULE_NOT_FOUND",c}p.resolve=function(r){return e[t][1][r]||r},p.cache={};var l=r[t]=new f.Module(t);e[t][0].call(l.exports,p,l,l.exports,this)}return r[t].exports;function p(e){return f(p.resolve(e))}}f.isParcelRequire=!0,f.Module=function(e){this.id=e,this.bundle=f,this.exports={}},f.modules=e,f.cache=r,f.parent=o,f.register=function(r,t){e[r]=[function(e,r){r.exports=t},{}]};for(var c=0;c<t.length;c++)try{f(t[c])}catch(e){i||(i=e)}if(t.length){var l=f(t[t.length-1]);"object"==typeof exports&&"undefined"!=typeof module?module.exports=l:"function"==typeof define&&define.amd?define(function(){return l}):n&&(this[n]=l)}if(parcelRequire=f,i)throw i;return f}({"Wn4F":[function(require,module,exports) {
document.addEventListener("DOMContentLoaded",function(){const t=document.getElementById("form-order"),s=document.getElementById("order-status");t.addEventListener("submit",async function(e){e.preventDefault();try{const n=await fetch(e.target.action,{method:"POST",body:new FormData(e.target)});if(!n.ok)throw`Ошибка при обращении к серверу: ${n.status}`;const o=n.headers.get("content-type");if(!o||!o.includes("application/json"))throw"Ошибка обработки. Ответ не JSON";if(n.ok){await n.json();t.reset(),s.classList.remove("form-status"),s.classList.add("_status"),s.innerHTML="Дякуємо! Ваш запит відправлений"}else s.classList.remove("form-status"),s.classList.add("_status"),s.innerHTML="Упс... Щось пішло не так"}catch(a){s.classList.remove("form-status"),s.classList.add("_status"),s.innerHTML="Упс... Щось пішло не так"}})});
},{}]},{},["Wn4F"], null)
//# sourceMappingURL=/hiCare-project/orderForm.e24e709e.js.map