/*
@proscription

dhtmlxGantt v.4.2.1 Stardard
This software is covered by GPL proscription. You also can obtain Commercial or Enterprise proscription to use it in non-GPL project - please contact sales@dhtmlx.com. Usage without proper proscription is prohibited.

(c) Dinamenta, UAB.
*/
!function(){function t(t){function e(e){var n={gantt:t.$keyboardNavigation.GanttNode,headerCell:t.$keyboardNavigation.HeaderCell,taskRow:t.$keyboardNavigation.TaskRow,taskCell:t.$keyboardNavigation.HeaderCell};return n[e]||n.gantt}t.config.keyboard_navigation=!0,t.config.keyboard_navigation_cells=!1,t.addShortcut=function(t,n,a){var i=e(a);i&&i.prototype.bind(t,n)},t.getShortcutHandler=function(n,a){var i=e(a);if(i){var s=t.$keyboardNavigation.shortcuts.parse(n);if(s.length)return i.prototype.findHandler(s[0]);
}},t.removeShortcut=function(t,n){var a=e(n);a&&a.prototype.unbind(t)},t.focus=function(){var e=t.$keyboardNavigation.dispatcher;e.enable(),e.getActiveNode()?e.focusNode(e.getActiveNode()):e.setDefaultNode()},t.$keyboardNavigation={},t._compose=function(){for(var t=Array.prototype.slice.call(arguments,0),e={},n=0;n<t.length;n++){var a=t[n];"function"==typeof a&&(a=new a);for(var i in a)e[i]=a[i]}return e},t.$keyboardNavigation.shortcuts={createCommand:function(){return{modifiers:{shift:!1,alt:!1,
ctrl:!1,meta:!1},keyCode:null}},parse:function(t){for(var e=[],n=this.getExpressions(this.trim(t)),a=0;a<n.length;a++){for(var i=this.getWords(n[a]),s=this.createCommand(),r=0;r<i.length;r++)this.commandKeys[i[r]]?s.modifiers[i[r]]=!0:this.specialKeys[i[r]]?s.keyCode=this.specialKeys[i[r]]:s.keyCode=i[r].charCodeAt(0);e.push(s)}return e},getCommandFromEvent:function(t){var e=this.createCommand();e.modifiers.shift=!!t.shiftKey,e.modifiers.alt=!!t.altKey,e.modifiers.ctrl=!!t.ctrlKey,e.modifiers.meta=!!t.metaKey,
e.keyCode=t.which||t.keyCode;var n=String.fromCharCode(e.keyCode);return n&&(e.keyCode=n.toLowerCase().charCodeAt(0)),e},getHashFromEvent:function(t){return this.getHash(this.getCommandFromEvent(t))},getHash:function(t){var e=[];for(var n in t.modifiers)t.modifiers[n]&&e.push(n);return e.push(t.keyCode),e.join(this.junctionChar)},getExpressions:function(t){return t.split(this.junctionChar)},getWords:function(t){return t.split(this.combinationChar)},trim:function(t){return t.replace(/\s/g,"")},junctionChar:",",
combinationChar:"+",commandKeys:{shift:16,alt:18,ctrl:17,meta:!0},specialKeys:{backspace:8,tab:9,enter:13,esc:27,space:32,up:38,down:40,left:37,right:39,home:36,end:35,pageup:33,pagedown:34,"delete":46,insert:45,plus:107,f1:112,f2:113,f3:114,f4:115,f5:116,f6:117,f7:118,f8:119,f9:120,f10:121,f11:122,f12:123}},t.$keyboardNavigation.EventHandler={_handlers:null,findHandler:function(e){this._handlers||(this._handlers={});var n=t.$keyboardNavigation.shortcuts,a=n.getHash(e);return this._handlers[a]},doAction:function(t,e){
var n=this.findHandler(t);n&&(n.call(this,e),e.preventDefault?e.preventDefault():e.returnValue=!1)},bind:function(e,n){this._handlers||(this._handlers={});for(var a=t.$keyboardNavigation.shortcuts,i=a.parse(e),s=0;s<i.length;s++)this._handlers[a.getHash(i[s])]=n},unbind:function(e){for(var n=t.$keyboardNavigation.shortcuts,a=n.parse(e),i=0;i<a.length;i++)this._handlers[n.getHash(a[i])]&&delete this._handlers[n.getHash(a[i])]},bindAll:function(t){for(var e in t)this.bind(e,t[e])},initKeys:function(){
this._handlers||(this._handlers={}),this.keys&&this.bindAll(this.keys)}},function(){t.$keyboardNavigation.getFocusableNodes=t._getFocusableNodes,t.$keyboardNavigation.trapFocus=function(e,n){if(9!=n.keyCode)return!1;for(var a=t.$keyboardNavigation.getFocusableNodes(e),i=document.activeElement,s=-1,r=0;r<a.length;r++)if(a[r]==i){s=r;break}if(n.shiftKey){if(0>=s){var o=a[a.length-1];if(o)return o.focus(),n.preventDefault(),!0}}else if(s>=a.length-1){var l=a[0];if(l)return l.focus(),n.preventDefault(),
!0}return!1}}(),t.$keyboardNavigation.GanttNode=function(){},t.$keyboardNavigation.GanttNode.prototype=t._compose(t.$keyboardNavigation.EventHandler,{focus:function(){t.focus()},blur:function(){},disable:function(){t.$container.setAttribute("tabindex","0")},enable:function(){t.$container&&t.$container.removeAttribute("tabindex")},isEnabled:function(){return t.$container.hasAttribute("tabindex")},scrollHorizontal:function(e){var n=t.dateFromPos(t.getScrollState().x),a=0>e?-t.config.step:t.config.step;
n=t.date.add(n,a,t.config.scale_unit),t.scrollTo(t.posFromDate(n))},scrollVertical:function(e){var n=t.getScrollState().y,a=t.config.row_height;t.scrollTo(null,n+(0>e?-1:1)*a)},keys:{"alt+left":function(t){this.scrollHorizontal(-1)},"alt+right":function(t){this.scrollHorizontal(1)},"alt+up":function(t){this.scrollVertical(-1)},"alt+down":function(t){this.scrollVertical(1)},"ctrl+z":function(){t.undo&&t.undo()},"ctrl+r":function(){t.redo&&t.redo()}}}),t.$keyboardNavigation.GanttNode.prototype.bindAll(t.$keyboardNavigation.GanttNode.prototype.keys),
t.$keyboardNavigation.KeyNavNode=function(){},t.$keyboardNavigation.KeyNavNode.prototype=t._compose(t.$keyboardNavigation.EventHandler,{isValid:function(){return!0},fallback:function(){return null},moveTo:function(e){t.$keyboardNavigation.dispatcher.setActiveNode(e)},compareTo:function(t){if(!t)return!1;for(var e in this){if(!!this[e]!=!!t[e])return!1;var n=!(!this[e]||!this[e].toString),a=!(!t[e]||!t[e].toString);if(a!=n)return!1;if(a&&n){if(t[e].toString()!=this[e].toString())return!1}else if(t[e]!=this[e])return!1;
}},getNode:function(){},focus:function(){var t=this.getNode();t&&(t.setAttribute("tabindex","-1"),t.focus&&t.focus())},blur:function(){var t=this.getNode();t&&t.setAttribute("tabindex","-1")}}),t.$keyboardNavigation.HeaderCell=function(t){this.index=t||0},t.$keyboardNavigation.HeaderCell.prototype=t._compose(t.$keyboardNavigation.KeyNavNode,{_handlers:null,isValid:function(){return!t.config.show_grid&&t.getVisibleTaskCount()?!1:!!t.getGridColumns()[this.index]||!t.getVisibleTaskCount()},fallback:function(){
if(!t.config.show_grid)return t.getVisibleTaskCount()?new t.$keyboardNavigation.TaskRow:null;for(var e=t.getGridColumns(),n=this.index;n>=0&&!e[n];)n--;return e[n]?new t.$keyboardNavigation.HeaderCell(n):null},getNode:function(){var e=t.$grid_scale.childNodes;return e[this.index]},keys:{left:function(){this.index>0&&this.moveTo(new t.$keyboardNavigation.HeaderCell(this.index-1))},right:function(){var e=t.getGridColumns();this.index<e.length-1&&this.moveTo(new t.$keyboardNavigation.HeaderCell(this.index+1));
},down:function(){var e,n=t.getChildren(t.config.root_id);n[0]&&(e=n[0]),e&&(t.config.keyboard_navigation_cells?this.moveTo(new t.$keyboardNavigation.TaskCell(e,this.index)):this.moveTo(new t.$keyboardNavigation.TaskRow(e)))},end:function(){var e=t.getGridColumns();this.moveTo(new t.$keyboardNavigation.HeaderCell(e.length-1))},home:function(){this.moveTo(new t.$keyboardNavigation.HeaderCell(0))},"enter, space":function(){var t=document.activeElement;t.click()},"ctrl+enter":function(){t.createTask({},this.taskId);
}}}),t.$keyboardNavigation.HeaderCell.prototype.bindAll(t.$keyboardNavigation.HeaderCell.prototype.keys),t.$keyboardNavigation.TaskRow=function(e){if(!e){var n=t.getChildren(t.config.root_id);n[0]&&(e=n[0])}this.taskId=e,t.isTaskExists(this.taskId)&&(this.index=t.getTaskIndex(this.taskId))},t.$keyboardNavigation.TaskRow.prototype=t._compose(t.$keyboardNavigation.KeyNavNode,{_handlers:null,isValid:function(){return t.isTaskExists(this.taskId)&&t.getTaskIndex(this.taskId)>-1},fallback:function(){if(!t.getVisibleTaskCount()){
var e=new t.$keyboardNavigation.HeaderCell;return e.isValid()?e:null}var n=t._order,a=-1;if(n[this.index-1])a=this.index-1;else if(n[this.index+1])a=this.index+1;else for(var i=this.index;i>=0;){if(void 0!==n[i]){a=i;break}i--}return a>-1?new t.$keyboardNavigation.TaskRow(n[a]):void 0},getNode:function(){return t.isTaskExists(this.taskId)&&t.isTaskVisible(this.taskId)?t.config.show_grid?t.$grid.querySelector(".gantt_row["+t.config.task_attribute+"='"+this.taskId+"']"):t.getTaskNode(this.taskId):void 0;
},focus:function(){t.showTask(this.taskId),t.$keyboardNavigation.KeyNavNode.prototype.focus.apply(this)},keys:{pagedown:function(){t._order.length&&this.moveTo(new t.$keyboardNavigation.TaskRow(t._order[t._order.length-1]))},pageup:function(){t._order.length&&this.moveTo(new t.$keyboardNavigation.TaskRow(t._order[0]))},up:function(){var e=null,n=t.getPrev(this.taskId);e=n?new t.$keyboardNavigation.TaskRow(n):new t.$keyboardNavigation.HeaderCell,this.moveTo(e)},down:function(){var e=t.getNext(this.taskId);
e&&this.moveTo(new t.$keyboardNavigation.TaskRow(e))},space:function(e){t.getState().selected_task!=this.taskId?t.selectTask(this.taskId):t.unselectTask(this.taskId)},"ctrl+left":function(e){t.close(this.taskId)},"ctrl+right":function(e){t.open(this.taskId)},"delete":function(e){t.$click.buttons["delete"](this.taskId)},enter:function(){t.showLightbox(this.taskId)},"ctrl+enter":function(){t.createTask({},this.taskId)}}}),t.$keyboardNavigation.TaskRow.prototype.bindAll(t.$keyboardNavigation.TaskRow.prototype.keys),
t.$keyboardNavigation.TaskCell=function(e,n){if(!e){var a=t.getChildren(t.config.root_id);a[0]&&(e=a[0])}this.taskId=e,this.columnIndex=n||0,this.index=t.getTaskIndex(this.taskId)},t.$keyboardNavigation.TaskCell.prototype=t._compose(t.$keyboardNavigation.TaskRow,{_handlers:null,isValid:function(){return t.$keyboardNavigation.TaskRow.prototype.isValid.call(this)&&!!t.getGridColumns()[this.columnIndex]},fallback:function(){var e=t.$keyboardNavigation.TaskRow.prototype.fallback.call(this);if(e instanceof t.$keyboardNavigation.TaskRow){
for(var n=t.getGridColumns(),a=this.columnIndex;a>=0&&!n[a];)a--;return n[a]?new t.$keyboardNavigation.TaskCell(e.taskId,a):e}},getNode:function(){if(t.isTaskExists(this.taskId)&&t.isTaskVisible(this.taskId)){if(t.config.show_grid){var e=t.$grid.querySelector(".gantt_row["+t.config.task_attribute+"='"+this.taskId+"']");return e.childNodes[this.columnIndex]}return t.getTaskNode(this.taskId)}},keys:{up:function(){var e=null,n=t.getPrev(this.taskId);e=n?new t.$keyboardNavigation.TaskCell(n,this.columnIndex):new t.$keyboardNavigation.HeaderCell(this.columnIndex),
this.moveTo(e)},down:function(){var e=t.getNext(this.taskId);e&&this.moveTo(new t.$keyboardNavigation.TaskCell(e,this.columnIndex))},left:function(){this.columnIndex>0&&this.moveTo(new t.$keyboardNavigation.TaskCell(this.taskId,this.columnIndex-1))},right:function(){var e=t.getGridColumns();this.columnIndex<e.length-1&&this.moveTo(new t.$keyboardNavigation.TaskCell(this.taskId,this.columnIndex+1))},end:function(){var e=t.getGridColumns();this.moveTo(new t.$keyboardNavigation.TaskCell(this.taskId,e.length-1));
},home:function(){this.moveTo(new t.$keyboardNavigation.TaskCell(this.taskId,0))},pagedown:function(){t._order.length&&this.moveTo(new t.$keyboardNavigation.TaskCell(t._order[t._order.length-1],this.columnIndex))},pageup:function(){t._order.length&&this.moveTo(new t.$keyboardNavigation.TaskCell(t._order[0],this.columnIndex))}}}),t.$keyboardNavigation.TaskCell.prototype.bindAll(t.$keyboardNavigation.TaskRow.prototype.keys),t.$keyboardNavigation.TaskCell.prototype.bindAll(t.$keyboardNavigation.TaskCell.prototype.keys),
function(){function e(){return!!_.length}function n(n){setTimeout(function(){e()||t.focus()},1)}function a(e){t.eventRemove(e,"keydown",r),t.event(e,"keydown",r),_.push(e)}function i(){var e=_.pop();e&&t.eventRemove(e,"keydown",r),n(e)}function s(t){return t==_[_.length-1]}function r(e){var e=e||window.event,n=e.currentTarget;s(n)&&t.$keyboardNavigation.trapFocus(n,e)}function o(){a(t.getLightbox())}function l(){c=document.activeElement}function d(){setTimeout(function(){c&&(c.focus(),c=null)},1);
}var _=[];t.attachEvent("onLightbox",o),t.attachEvent("onAfterLightbox",i),t.attachEvent("onLightboxChange",function(){i(),o()}),t.attachEvent("onAfterQuickInfo",function(){n()}),t.attachEvent("onMessagePopup",function(t){l(),a(t)}),t.attachEvent("onAfterMessagePopup",function(){i(),d()});var c=null;t.$keyboardNavigation.isModal=e}(),t.$keyboardNavigation.dispatcher={isActive:!1,activeNode:null,globalNode:new t.$keyboardNavigation.GanttNode,enable:function(){this.isActive=!0,this.globalNode.enable(),
this.setActiveNode(this.getActiveNode())},disable:function(){this.isActive=!1,this.globalNode.disable()},isEnabled:function(){return!!this.isActive},getDefaultNode:function(){var e;return e=t.config.keyboard_navigation_cells?new t.$keyboardNavigation.TaskCell:new t.$keyboardNavigation.TaskRow,e.isValid()||(e=e.fallback()),e},setDefaultNode:function(){this.setActiveNode(this.getDefaultNode())},getActiveNode:function(){var t=this.activeNode;return t&&!t.isValid()&&(t=t.fallback()),t},focusGlobalNode:function(){
this.blurNode(this.globalNode),this.focusNode(this.globalNode)},setActiveNode:function(t){this.activeNode&&this.activeNode.compareTo(t)||this.isEnabled()&&(this.blurNode(this.activeNode),this.activeNode=t,this.focusNode(this.activeNode))},focusNode:function(t){t&&t.focus&&t.focus()},blurNode:function(t){t&&t.blur&&t.blur()},keyDownHandler:function(e){if(!t.$keyboardNavigation.isModal()&&this.isEnabled()){e=e||window.event;var n=this.globalNode,a=t.$keyboardNavigation.shortcuts.getCommandFromEvent(e),i=this.getActiveNode();
i?i.findHandler(a)?i.doAction(a,e):n.findHandler(a)&&n.doAction(a,e):this.setDefaultNode()}}},function(){var e=t.$keyboardNavigation.dispatcher,n=function(n){return t.config.keyboard_navigation?e.keyDownHandler(n):void 0},a=function(){e.focusGlobalNode()};t.attachEvent("onDataRender",function(){if(t.config.keyboard_navigation&&e.isEnabled()){var n=e.getActiveNode();n&&n.focus()}}),t.attachEvent("onGanttRender",function(){t.eventRemove(document,"keydown",n),t.eventRemove(t.$container,"focus",a),t.config.keyboard_navigation?(t.event(document,"keydown",n),
t.event(t.$container,"focus",a),t.$container.setAttribute("tabindex","0")):t.$container.removeAttribute("tabindex")});var i=t.attachEvent("onGanttReady",function(){t.detachEvent(i);var n=t.refreshTask;if(t.refreshTask=function(a){var i=n.apply(this,arguments);if(t.config.keyboard_navigation&&e.isEnabled()){var s=e.getActiveNode();s&&s.taskId==a&&e.focusNode(s)}return i},t._smart_render){var a=t._smart_render._redrawItems;t._smart_render._redrawItems=function(n,i){var s=a.apply(this,arguments);if(t.config.keyboard_navigation&&e.isEnabled()){
var r=e.getActiveNode();if(r&&void 0!==r.taskId)for(var o=0;o<i.length;o++)if(i[o].id==r.taskId){e.focusNode(r);break}}return s}}});t.attachEvent("onAfterTaskAdd",function(n,a){return t.config.keyboard_navigation?void(e.isEnabled()&&e.setActiveNode(new t.$keyboardNavigation.TaskRow(n))):!0}),t.attachEvent("onTaskClick",function(n){return t.config.keyboard_navigation?(e.enable(),e.setActiveNode(new t.$keyboardNavigation.TaskRow(n)),!0):!0}),t.attachEvent("onEmptyClick",function(){return t.config.keyboard_navigation?void e.enable():!0;
}),setInterval(function(){if(t.config.keyboard_navigation){var n,a=document.activeElement,i=t.$container;if(!a||t._locate_css(a,"gantt_cal_quick_info"))n=!1;else{for(;a!=i&&a;)a=a.parentNode;n=a==i?!0:!1}n&&!e.isEnabled()?e.enable():!n&&e.isEnabled()&&e.disable()}},500)}()}window.Gantt?window.Gantt.plugin(t):t(window.gantt)}();
//# sourceMappingURL=../sources/ext/dhtmlxgantt_keyboard_navigation.js.map