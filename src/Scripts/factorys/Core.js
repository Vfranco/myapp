app.factory('Core', ['$window', function ($window) {

    var core = {};

    core.secretKey = 'Zw~3t!D_2z7S';

    core.isEmpty = function (str)
    {
        return (str == "" || str == undefined) ? true : false;
    };

    core.getFieldsForm = function (form, css)
    {
        var fields = $(form).find(css);

        return fields;
    };

    core.onChange   = function (combo, callback)
    {
        $(combo).on('change', callback);
    };

    core.clearTable = function (table)
    {
        var hasRows = $(table).children();

        if(hasRows.length > 0)
            return $(table).empty();
    };

    core.disabledButton = function (button, status)
    {
        return $(button).attr('disabled', status);
    };

    core.signToken = function(payload, secret)
    {
        var token = JWT.generateToken(payload);
        var tokenSigned = JWT.encode(token, secret);

        return tokenSigned;
    }

    core.eventClickTable = function(table, css, callback)
    {
        return $(table).on('click', css, callback);
    };

    core.clearList  = function(list)
    {
        var hasItems = $(list).children();

        if(hasItems.length > 0)
            return $(list).empty();
    }

    core.getTheadList = function(element, css)
    {
        if(this.isEmpty(css) || this.isEmpty(element))
            return;

        var resultObject = {};

        var table = element[0];
        var theads = table.getElementsByClassName(css);        

        for(var i = 0; i < theads.length; i++)
        {
            text = theads[i];
            resultObject[i] = text.textContent;
        }

        return resultObject;
    }

    core.getTheadText = function(idTable)
    {
        var thead = $(idTable);
        var resultText = [];

        for(var i = 0; i < thead.length; i++)
            resultText.push($(thead[i]).text());

        return resultText;
    }

    core.isEmptyObject = function(obj)
    {
        for(var item in obj)
        {
            if(obj.hasOwnProperty(item))
                return false;
        }

        return true;
    }

    core.isNull = function(value)
    {
        if(value == null)
            return true;

        return false;
    }

    core.createStorage = function(name, items)
    {
        return $window.localStorage.setItem(name, JSON.stringify(items));
    }

    core.getFromStorage = function(element)
    {
        return JSON.parse($window.localStorage.getItem(element));
    }

    core.dataSession = {};

    return core;
}]);