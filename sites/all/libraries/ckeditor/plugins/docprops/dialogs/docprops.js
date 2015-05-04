﻿/*
Copyright (c) 2003-2012, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.dialog.add('docProps',function(a){var b=a.lang.docprops,c=a.lang.common,d={};function e(n,o){var p=function(){q(this);o(this,this._.parentDialog);},q=function(s){s.removeListener('ok',p);s.removeListener('cancel',q);},r=function(s){s.on('ok',p);s.on('cancel',q);};a.execCommand(n);if(a._.storedDialogs.colordialog)r(a._.storedDialogs.colordialog);else CKEDITOR.on('dialogDefinition',function(s){if(s.data.name!=n)return;var t=s.data.definition;s.removeListener();t.onLoad=CKEDITOR.tools.override(t.onLoad,function(u){return function(){r(this);t.onLoad=u;if(typeof u=='function')u.call(this);};});});};function f(){var n=this.getDialog(),o=n.getContentElement('general',this.id+'Other');if(!o)return;if(this.getValue()=='other'){o.getInputElement().removeAttribute('readOnly');o.focus();o.getElement().removeClass('cke_disabled');}else{o.getInputElement().setAttribute('readOnly',true);o.getElement().addClass('cke_disabled');}};function g(n,o,p){return function(q,r,s){var t=d,u=typeof p!='undefined'?p:this.getValue();if(!u&&n in t)t[n].remove();else if(u&&n in t)t[n].setAttribute('content',u);else if(u){var v=new CKEDITOR.dom.element('meta',a.document);v.setAttribute(o?'http-equiv':'name',n);v.setAttribute('content',u);s.append(v);}};};function h(n,o){return function(){var p=d,q=n in p?p[n].getAttribute('content')||'':'';if(o)return q;this.setValue(q);return null;};};function i(n){return function(o,p,q,r){r.removeAttribute('margin'+n);var s=this.getValue();if(s!=='')r.setStyle('margin-'+n,CKEDITOR.tools.cssLength(s));else r.removeStyle('margin-'+n);};};function j(n){var o={},p=n.getElementsByTag('meta'),q=p.count();for(var r=0;r<q;r++){var s=p.getItem(r);o[s.getAttribute(s.hasAttribute('http-equiv')?'http-equiv':'name').toLowerCase()]=s;}return o;};function k(n,o,p){n.removeStyle(o);if(n.getComputedStyle(o)!=p)n.setStyle(o,p);};var l=function(n,o,p){return{type:'hbox',padding:0,widths:['60%','40%'],children:[CKEDITOR.tools.extend({type:'text',id:n,label:b[o]},p||{},1),{type:'button',id:n+'Choose',label:b.chooseColor,className:'colorChooser',onClick:function(){var q=this;e('colordialog',function(r){var s=q.getDialog();s.getContentElement(s._.currentTabId,n).setValue(r.getContentElement('picker','selectedColor').getValue());});}}]};},m='javascript:void((function(){'+encodeURIComponent('document.open();'+(CKEDITOR.env.isCustomDomain()?"document.domain='"+document.domain+"';":'')+'document.write( \'<html style="background-color: #ffffff; height: 100%"><head></head><body style="width: 100%; height: 100%; margin: 0px">'+b.previewHtml+"</body></html>' );"+'document.close();')+'})())';
return{title:b.title,minHeight:330,minWidth:500,onShow:function(){var n=a.document,o=n.getElementsByTag('html').getItem(0),p=n.getHead(),q=n.getBody();d=j(n);this.setupContent(n,o,p,q);},onHide:function(){d={};},onOk:function(){var n=a.document,o=n.getElementsByTag('html').getItem(0),p=n.getHead(),q=n.getBody();this.commitContent(n,o,p,q);},contents:[{id:'general',label:c.generalTab,elements:[{type:'text',id:'title',label:b.docTitle,setup:function(n){this.setValue(n.getElementsByTag('title').getItem(0).data('cke-title'));},commit:function(n,o,p,q,r){if(r)return;n.getElementsByTag('title').getItem(0).data('cke-title',this.getValue());}},{type:'hbox',children:[{type:'select',id:'dir',label:c.langDir,style:'width: 100%',items:[[c.notSet,''],[c.langDirLtr,'ltr'],[c.langDirRtl,'rtl']],setup:function(n,o,p,q){this.setValue(q.getDirection()||'');},commit:function(n,o,p,q){var r=this.getValue();if(r)q.setAttribute('dir',r);else q.removeAttribute('dir');q.removeStyle('direction');}},{type:'text',id:'langCode',label:c.langCode,setup:function(n,o){this.setValue(o.getAttribute('xml:lang')||o.getAttribute('lang')||'');},commit:function(n,o,p,q,r){if(r)return;var s=this.getValue();if(s)o.setAttributes({'xml:lang':s,lang:s});else o.removeAttributes({'xml:lang':1,lang:1});}}]},{type:'hbox',children:[{type:'select',id:'charset',label:b.charset,style:'width: 100%',items:[[c.notSet,''],[b.charsetASCII,'us-ascii'],[b.charsetCE,'iso-8859-2'],[b.charsetCT,'big5'],[b.charsetCR,'iso-8859-5'],[b.charsetGR,'iso-8859-7'],[b.charsetJP,'iso-2022-jp'],[b.charsetKR,'iso-2022-kr'],[b.charsetTR,'iso-8859-9'],[b.charsetUN,'utf-8'],[b.charsetWE,'iso-8859-1'],[b.other,'other']],'default':'',onChange:function(){var n=this;n.getDialog().selectedCharset=n.getValue()!='other'?n.getValue():'';f.call(n);},setup:function(){var q=this;q.metaCharset='charset' in d;var n=h(q.metaCharset?'charset':'content-type',1,1),o=n.call(q);!q.metaCharset&&o.match(/charset=[^=]+$/)&&(o=o.substring(o.indexOf('=')+1));if(o){q.setValue(o.toLowerCase());if(!q.getValue()){q.setValue('other');var p=q.getDialog().getContentElement('general','charsetOther');p&&p.setValue(o);}q.getDialog().selectedCharset=o;}f.call(q);},commit:function(n,o,p,q,r){var v=this;if(r)return;var s=v.getValue(),t=v.getDialog().getContentElement('general','charsetOther');s=='other'&&(s=t?t.getValue():'');s&&!v.metaCharset&&(s=(d['content-type']?d['content-type'].getAttribute('content').split(';')[0]:'text/html')+'; charset='+s);var u=g(v.metaCharset?'charset':'content-type',1,s);
u.call(v,n,o,p);}},{type:'text',id:'charsetOther',label:b.charsetOther,onChange:function(){this.getDialog().selectedCharset=this.getValue();}}]},{type:'hbox',children:[{type:'select',id:'docType',label:b.docType,style:'width: 100%',items:[[c.notSet,''],['XHTML 1.1','<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">'],['XHTML 1.0 Transitional','<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">'],['XHTML 1.0 Strict','<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">'],['XHTML 1.0 Frameset','<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">'],['HTML 5','<!DOCTYPE html>'],['HTML 4.01 Transitional','<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">'],['HTML 4.01 Strict','<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">'],['HTML 4.01 Frameset','<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">'],['HTML 3.2','<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2 Final//EN">'],['HTML 2.0','<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">'],[b.other,'other']],onChange:f,setup:function(){var o=this;if(a.docType){o.setValue(a.docType);if(!o.getValue()){o.setValue('other');var n=o.getDialog().getContentElement('general','docTypeOther');n&&n.setValue(a.docType);}}f.call(o);},commit:function(n,o,p,q,r){if(r)return;var s=this.getValue(),t=this.getDialog().getContentElement('general','docTypeOther');a.docType=s=='other'?t?t.getValue():'':s;}},{type:'text',id:'docTypeOther',label:b.docTypeOther}]},{type:'checkbox',id:'xhtmlDec',label:b.xhtmlDec,setup:function(){this.setValue(!!a.xmlDeclaration);},commit:function(n,o,p,q,r){if(r)return;if(this.getValue()){a.xmlDeclaration='<?xml version="1.0" encoding="'+(this.getDialog().selectedCharset||'utf-8')+'"?>';o.setAttribute('xmlns','http://www.w3.org/1999/xhtml');}else{a.xmlDeclaration='';o.removeAttribute('xmlns');}}}]},{id:'design',label:b.design,elements:[{type:'hbox',widths:['60%','40%'],children:[{type:'vbox',children:[l('txtColor','txtColor',{setup:function(n,o,p,q){this.setValue(q.getComputedStyle('color'));},commit:function(n,o,p,q,r){if(this.isChanged()||r){q.removeAttribute('text');var s=this.getValue();if(s)q.setStyle('color',s);else q.removeStyle('color');}}}),l('bgColor','bgColor',{setup:function(n,o,p,q){var r=q.getComputedStyle('background-color')||'';
this.setValue(r=='transparent'?'':r);},commit:function(n,o,p,q,r){if(this.isChanged()||r){q.removeAttribute('bgcolor');var s=this.getValue();if(s)q.setStyle('background-color',s);else k(q,'background-color','transparent');}}}),{type:'hbox',widths:['60%','40%'],padding:1,children:[{type:'text',id:'bgImage',label:b.bgImage,setup:function(n,o,p,q){var r=q.getComputedStyle('background-image')||'';if(r=='none')r='';else r=r.replace(/url\(\s*(["']?)\s*([^\)]*)\s*\1\s*\)/i,function(s,t,u){return u;});this.setValue(r);},commit:function(n,o,p,q){q.removeAttribute('background');var r=this.getValue();if(r)q.setStyle('background-image','url('+r+')');else k(q,'background-image','none');}},{type:'button',id:'bgImageChoose',label:c.browseServer,style:'display:inline-block;margin-top:10px;',hidden:true,filebrowser:'design:bgImage'}]},{type:'checkbox',id:'bgFixed',label:b.bgFixed,setup:function(n,o,p,q){this.setValue(q.getComputedStyle('background-attachment')=='fixed');},commit:function(n,o,p,q){if(this.getValue())q.setStyle('background-attachment','fixed');else k(q,'background-attachment','scroll');}}]},{type:'vbox',children:[{type:'html',id:'marginTitle',html:'<div style="text-align: center; margin: 0px auto; font-weight: bold">'+b.margin+'</div>'},{type:'text',id:'marginTop',label:b.marginTop,style:'width: 80px; text-align: center',align:'center',inputStyle:'text-align: center',setup:function(n,o,p,q){this.setValue(q.getStyle('margin-top')||q.getAttribute('margintop')||'');},commit:i('top')},{type:'hbox',children:[{type:'text',id:'marginLeft',label:b.marginLeft,style:'width: 80px; text-align: center',align:'center',inputStyle:'text-align: center',setup:function(n,o,p,q){this.setValue(q.getStyle('margin-left')||q.getAttribute('marginleft')||'');},commit:i('left')},{type:'text',id:'marginRight',label:b.marginRight,style:'width: 80px; text-align: center',align:'center',inputStyle:'text-align: center',setup:function(n,o,p,q){this.setValue(q.getStyle('margin-right')||q.getAttribute('marginright')||'');},commit:i('right')}]},{type:'text',id:'marginBottom',label:b.marginBottom,style:'width: 80px; text-align: center',align:'center',inputStyle:'text-align: center',setup:function(n,o,p,q){this.setValue(q.getStyle('margin-bottom')||q.getAttribute('marginbottom')||'');},commit:i('bottom')}]}]}]},{id:'meta',label:b.meta,elements:[{type:'textarea',id:'metaKeywords',label:b.metaKeywords,setup:h('keywords'),commit:g('keywords')},{type:'textarea',id:'metaDescription',label:b.metaDescription,setup:h('description'),commit:g('description')},{type:'text',id:'metaAuthor',label:b.metaAuthor,setup:h('author'),commit:g('author')},{type:'text',id:'metaCopyright',label:b.metaCopyright,setup:h('copyright'),commit:g('copyright')}]},{id:'preview',label:c.preview,elements:[{type:'html',id:'previewHtml',html:'<iframe src="../../../ckeditor/plugins/docprops/dialogs/'+m+'" style="width: 100%; height: 310px" hidefocus="true" frameborder="0" '+'id="cke_docProps_preview_iframe"></iframe>',onLoad:function(){this.getDialog().on('selectPage',function(n){if(n.data.page=='preview'){var o=this;
setTimeout(function(){var p=CKEDITOR.document.getById('cke_docProps_preview_iframe').getFrameDocument(),q=p.getElementsByTag('html').getItem(0),r=p.getHead(),s=p.getBody();o.commitContent(p,q,r,s,1);},50);}});CKEDITOR.document.getById('cke_docProps_preview_iframe').getAscendant('table').setStyle('height','100%');}}]}]};});
