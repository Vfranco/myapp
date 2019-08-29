app.service('FormBuilder', [function(){
    
    //Parqueadero Formulario
    this.parking = [    
    {
        label       : 'Nit',
        name        : 'nit_parqueaderos',
        placeholder : 'Nit del Parqueadero',
        required    : true,
        type        : 'text',
        css         : 'c-field u-mb-xsmall',
        cssText     : 'NitParqueaderos'
    },
    {
        label       : 'Nombre',
        name        : 'nombre_parqueaderos',
        placeholder : 'Nombre de la Empresa',
        required    : true,
        type        : 'text',
        css         : 'c-field u-mb-xsmall',
        cssText     : 'NombreParqueaderos'
    },
    {
        label       : 'Direccion',
        name        : 'dir_parqueaderos',
        placeholder : 'Direccion de la Empresa',
        required    : true,
        type        : 'text',
        css         : 'c-field u-mb-xsmall',
        cssText     : 'DirParqueaderos'
    },
    {
        label       : 'Telefono',
        name        : 'telefono_parqueadero',
        placeholder : 'Telefono de la Empresa',
        required    : true,
        type        : 'text',
        css         : 'c-field u-mb-xsmall',
        cssText     : 'TelefonoParqueadero'
    },
    {
        label       : 'Logo de la Empresa',
        name        : 'logo_parqueaderos',
        placeholder : 'Slogan de la Empresa',
        required    : true,
        type        : 'text',
        css         : 'c-field u-mb-xsmall',
        cssText     : 'LogoParqueaderos'
    }];

    /**
     * Modelo Zonas
     */
    this.zonas = [
    {
        test : 'zona'
    }]    

    this.devices = [
    {
        label       : 'Nombre del Dispositivo',
        name        : 'id_android_mobile',
        placeholder : 'Ingrese nombre',
        required    : true,
        type        : 'text',
        css         : 'c-field u-mb-xsmall',
        cssText     : 'SerialMobile'
    },
    {
        label       : 'IMEI',
        name        : 'serial_mobile',
        placeholder : 'Ingrese IMEI',
        required    : true,
        type        : 'text',
        css         : 'c-field u-mb-xsmall',
        cssText     : 'IdAndroidMobile'
    }]
}]);