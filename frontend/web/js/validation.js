function Validation() {

    this.init = function (options) {
        this.defaultParams = {
            class: "valItem",
            tagNameErrorMessage: "data-msg",
            event: 'submit',
            eventElement: '#submit',
            errorClass: 'inputError',
            errorMessageClass: 'errorMsgClass',
            ajaxUrl: 'ajax.php',
            ajax: true,
            tpl:[],
            ajaxSubmitSuccess: function (responseText, err, form) {
                if (!err) {
                    form.submit();
                }
            },
            ajaxOnblurSuccess: function (responseText, err, form) {
            },
        };

        this.finalParams = this.defaultParams;

        for (var key in options) {
            if (options.hasOwnProperty(key)) {
                if (options[key] !== undefined) {
                    this.finalParams[key] = options[key];
                }
            }
        }
        this.options = this.finalParams;


        if (this.options.event == 'submit') {
            var submitElement = this.getSubmitElement();
            submitElement.onclick = this.customSubmit.bind(this);
        } else if (this.options.event == 'onblur') {
            var valElements = this.getValInput();
            for (var i = 0; i < valElements.length; i++) {
                valElements[i].onblur = this.customValidationOnblur.bind(this);
            }
        }
    }

    this.customSubmit = function (event) {
        event.preventDefault();
        var validationElements = document.getElementsByClassName(this.options.class);
        var form = this.getParent(this.getSubmitElement(), 'FORM');
        var flag = [];
        for (var i = 0; i < validationElements.length; i++) {
            var next = validationElements[i].nextElementSibling;
            if(next != null){
                if (next.classList.contains(this.options.errorMessageClass)) {
                    next.parentNode.removeChild(next);
                }
            }
            if (validationElements[i].hasAttribute('data-tpl')) {

            }
            else {
                if (!validationElements[i].checkValidity()) {
                    validationElements[i].classList.add(this.options.errorClass);
                    this.generateErrorMsg(validationElements[i]);
                    flag.push(false);
                }
                else {
                    validationElements[i].classList.remove(this.options.errorClass);
                    flag.push(true);
                }
            }
        }
        if (this.findFalse(flag)) {
            if (this.options.ajax) {
                this.ajaxValidPost(validationElements, this.options.ajaxSubmitSuccess);
            }
            else {
                form.submit();
            }
        }
    }

    this.customValidationOnblur = function (event) {
        var validationElement = event.target;
        var next = validationElement.nextSibling;
        if(next != null){
            if (next.classList.contains(this.options.errorMessageClass)) {
                next.parentNode.removeChild(next);
            }
        }
        if (validationElement.hasAttribute('data-tpl')) {
            var arr = validationElement.getAttribute('data-tpl');
            var pat = this.tpls();
            var val = validationElement.value;
            //console.log(pat);
            if (!pat[arr.trim()].test(val)) {
                this.generateErrorMsg(validationElement);
            }
            else {
                this.deleteErrorMsg(validationElement);
            }
        }
        else {
            if (!validationElement.checkValidity()) {
                //validationElement.classList.add(this.options.errorClass);
                this.generateErrorMsg(validationElement);
            }
            else {
                this.ajaxValidPost(validationElement, this.options.ajaxOnblurSuccess);
            }
        }
    }

    this.getParent = function (obj, parentTagName) {
        return (obj.tagName == parentTagName) ? obj : this.getParent(obj.parentNode, parentTagName);
    }

    this.generateErrorMsg = function (vEl) {
        vEl.classList.add(this.options.errorClass);
        if (vEl.hasAttribute(this.options.tagNameErrorMessage)) {
            var errorMsg = document.createElement('span');
            errorMsg.classList.add(this.options.errorMessageClass);
            errorMsg.innerHTML = vEl.getAttribute(this.options.tagNameErrorMessage);
            this.insertAfter(errorMsg, vEl);
        }
    }

    this.generateAjaxErrorMsg = function (vEl, msg) {
        vEl.classList.add(this.options.errorClass);
        var errorMsg = document.createElement('span');
        errorMsg.classList.add(this.options.errorMessageClass);
        errorMsg.innerHTML = msg;
        this.insertAfter(errorMsg, vEl);
    }

    this.getSubmitElement = function () {
        var submitElement;

        if (this.options.eventElement[0] == '#') {
            submitElement = document.getElementById(this.options.eventElement.slice(1));
        }
        else {
            submitElement = document.getElementsByClassName(this.options.eventElement.slice(1));
        }
        return submitElement;
    }

    this.getValInput = function () {
        var valInput;

        valInput = document.getElementsByClassName(this.options.class);

        return valInput;
    }

    this.insertAfter = function (elem, refElem) {
        var parent = refElem.parentNode;
        var next = refElem.nextSibling;
        if (next) {
            return parent.insertBefore(elem, next);
        } else {
            return parent.appendChild(elem);
        }
    }

    this.findFalse = function (arr) {
        for (var i = 0; i < arr.length; i++) {
            if (arr[i] === false) {
                return false;
            }
        }
        return true;
    }


    this.ajaxValidPost = function (validationElement, callback) {
        callback = callback || function () {
            };
        if (!this.options.ajax) return;
        var xhr = new XMLHttpRequest();
        var obj = this;
        var flag = false;
        if (validationElement.length > 1) {
            var send = '';
            for (var i = 0; i < validationElement.length; i++) {
                send += validationElement[i].getAttribute('name') + '=' + encodeURIComponent(validationElement[i].value) + '&';
            }
            xhr.open('POST', this.options.ajaxUrl, true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onreadystatechange = function () {
                if (xhr.readyState != 4) return;
                if (xhr.status == 200) {
                    var ans = JSON.parse(xhr.responseText);
                    for (var i = 0; i < ans.length; i++) {
                        var vEl = document.getElementsByName(ans[i].item);
                        if (ans[i].status == 0) {
                            obj.generateAjaxErrorMsg(vEl[0], ans[i].error_msg);
                            flag = true;
                        }
                        else {
                            obj.deleteErrorMsg(vEl[0]);
                        }
                    }
                }
                else {
                    for (var j = 0; j < validationElement.length; j++) {
                        obj.generateAjaxErrorMsg(validationElement[j], 'Ошибка ' + xhr.status);
                        flag = true;
                    }
                }
            }
            send = send.slice(0, send.length - 1);
            xhr.send(send);
        }
        else {
            if (validationElement.hasAttribute('data-url')) {
                xhr.open('POST', this.options.ajaxUrl, true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onreadystatechange = function () {
                    if (xhr.readyState != 4) return;
                    if (xhr.status == 200) {
                        var ans = JSON.parse(xhr.responseText);
                        if (ans.status == 0) {
                            obj.generateAjaxErrorMsg(validationElement, ans.error_msg);
                            flag = true;
                        }
                        else {
                            obj.deleteErrorMsg(validationElement);
                        }
                    }
                    else {
                        obj.generateAjaxErrorMsg(validationElement, 'Ошибка ' + xhr.status);
                        flag = true;
                    }
                }

                xhr.send(validationElement.getAttribute('name') + '=' + encodeURIComponent(validationElement.value));
            }
        }
        var form = this.getParent(this.getSubmitElement(), 'FORM');
        xhr.onloadend = function () {
            callback(xhr.responseText, flag, form);
        }
    }

    this.deleteErrorMsg = function (vEl) {
        vEl.classList.remove(this.options.errorClass);
        if(vEl.nextElementSibling != null){
            if (vEl.nextElementSibling.classList.contains(this.options.errorMessageClass)) {
                vEl.nextElementSibling.remove();
            }
        }
    }

    this.tpl = [];

    this.tpls = function () {
        for(var i=0;i<this.options.tpl.length;i++){
            if(this.options.tpl[i].name !== '' && this.options.tpl[i].tpl !== ''){
                this.tpl[this.options.tpl[i].name] = this.options.tpl[i].tpl;
            }
        }
        this.tpl['number'] = /^\d+$/;
        this.tpl['lat'] = /^[a-zA-Z]+$/;
        this.tpl['kir'] = /^[А-Яа-яЁё\s]+$/;
        this.tpl['kir+lat'] = /^[a-zA-ZА-Яа-яЁё\s]+$/;
        this.tpl['kir+number'] = /^[\dА-Яа-яЁё\s]+$/;
        this.tpl['lat+number'] = /^[\da-zA-Z]+$/;
        return this.tpl;
    }

    this.addTpl = function(name, tpl){
        this.tpl[name] = tpl;
    }
}