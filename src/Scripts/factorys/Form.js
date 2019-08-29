app.factory('Form', ['Core', '$http', function (Core, $http) {

    var _this = {};

    _this.validate = function (form, css) {
        var fields = Core.getFieldsForm(form, css), status = false;

        for(var i = 0; i < fields.length; i++)
        {
            var input = $(fields[i]);

            if (Core.isEmpty(input.val())){
                input.focus().addClass('shake animated');
                status = true;
                break;
            } else if($.trim(input.val()) == "") {
                input.val('');
                input.focus().addClass('shake animated');
                status = true;
                break;
            }
        }

        return status;
    };

    _this.serializeForm = function(formid) {

        var frmObject = {};
        var frm = $(formid).serializeArray();        

        for(var i = 0; i < frm.length; i++)
            frmObject[frm[i].name] = frm[i].value;

        return frmObject;
    };

    _this.formDataModal = function(set, response, type)
    {
        var server = response;

        for (var key in server)
        {
            if (server.hasOwnProperty(key)) 
            {
                if (type == 'value')
                {
                    if(Core.isEmpty(server[key]))
                        $(set + key).val('N/A');
                    else
                        $(set + key).val(server[key]);
                }
                else
                {
                    if(Core.isEmpty(server[key]))
                        $(set + key).text('N/A');
                    else
                        $(set + key).text(server[key]);
                }
            }
        }
    };

    _this.resetForm = function(formid)
    {
        return $(formid).trigger('reset');
    }

    _this.OnSubmitForm = function(obj)
    {
        var promise, status = false;

        if(Core.isEmptyObject(obj))
            throw "Empty Object";

        if(_this.validate(obj.form, obj.css))
            status = true;
        else
            promise = $http.post(obj.route, _this.serializeForm(obj.form + obj.fields ));

        if(obj.clear)
            _this.resetForm(obj.form);
            
        if(status)
            return true;

        return promise;
    }

    _this.test = function()
    {
        console.log('here Form');
    }

    return _this;
}]);