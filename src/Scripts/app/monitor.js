app.controller('monitor', ['$scope', 'Socket', '$http', 'webNotification', '$window', function($scope, Socket, $http, webNotification, $window){

    $scope.registrosMiPersonal = [];
    $scope.registrosMisVisitantes = [];
    $scope.registrosMisContratistas = [];
    $scope.uid = uid;

    $scope.visitasHoyMiPersonal = 0;
    $scope.visitasAyerMiPersonal = 0;
    $scope.visitasMesMiPersonal = 0;
    $scope.visitasTotalMiPersonal = 0;

    $scope.visitasHoyMisVisitantes = 0;
    $scope.visitasAyerMisVisitantes = 0;
    $scope.visitasMesMisVisitantes = 0;
    $scope.visitasTotalMisVisitantes = 0;

    $scope.visitasHoyMisContratistas = 0;
    $scope.visitasAyerMisContratistas = 0;
    $scope.visitasMesMisContratistas = 0;
    $scope.visitasTotalMisContratistas = 0;

    $scope.background = 'mipersonal';
    
    var serviceWorkerRegistration;

    if (navigator.serviceWorker)
    {
        console.log('here');
        navigator.serviceWorker.register('service-worker.js').then(function (registration) {
            serviceWorkerRegistration = registration;
        });
    }
    
    Notification.requestPermission().then(permision => {
        console.log(permision);
    });

    webNotification.showNotification('Hola', {
        serviceWorkerRegistration: serviceWorkerRegistration,
        body: 'Mundo!',
        onClick: function onNotificationClicked() {
            console.log('Notification clicked.');
        },
        autoClose: 4000
    }, function onShow(error, hide) {
        if (error) {
            console.log('Unable to show notification: ' + error.message);
        } else {
            console.log('Notification Shown.');

            setTimeout(function hideNotification() {
                console.log('Hiding notification....');
                hide();
            }, 5000);
        }
    });

    Socket.on('connect', function(result){
        console.log('here websocket');
    });

    Socket.on('disconnect', function(){
        console.log('desconectado');        
    });

    $scope.data = {};

    Socket.on('iopersonal', function(result){
        $scope.background = 'mipersonal';
        console.log(result);        
        $scope.getDataMiPersonal(result);
        $scope.showMiPersonal();
    });

    Socket.on('iovisitantes', function(result){
        $scope.background = 'misvisitantes';
        console.log(result);        
        $scope.getDataMisVisitantes(result);
        $scope.showMisVisitantes();
    });

    Socket.on('iocontratistas', function(result){
        $scope.background = 'miscontratistas';
        console.log(result);        
        $scope.getDataMisContratistas(result);
        $scope.showMisContratistas();
    });

    $scope.getDataMiPersonal = function(uid){
        $http.post(baseurl + 'monitor/personal', uid).then(response => {
            
            if(response.data.status)
            {
                $scope.registrosMiPersonal = response.data.rows;

                $scope.visitasHoyMiPersonal = response.data.rows[0].hoy;
                $scope.visitasAyerMiPersonal = response.data.rows[0].ayer;
                $scope.visitasMesMiPersonal = response.data.rows[0].mes;
                $scope.visitasTotalMiPersonal = response.data.rows[0].hoy + response.data.rows[0].ayer + response.data.rows[0].mes;                
            }
        });
    }

    $scope.getDataMisVisitantes = function(uid){
        $http.post(baseurl + 'monitor/visitantes', uid).then(response => {

            if(response.data.status)
            {
                $scope.registrosMisVisitantes = response.data.rows;

                $scope.visitasHoyMisVisitantes = response.data.rows[0].hoy;
                $scope.visitasAyerMisVisitantes = response.data.rows[0].ayer;
                $scope.visitasMesMisVisitantes = response.data.rows[0].mes;
                $scope.visitasTotalMisVisitantes = response.data.rows[0].hoy + response.data.rows[0].ayer + response.data.rows[0].mes;                
            }
        });
    }

    $scope.getDataMisContratistas = function(uid){
        $http.post(baseurl + 'monitor/contratistas', uid).then(response => {
            
            if(response.data.status)
            {
                $scope.registrosMisContratistas = response.data.rows;

                $scope.visitasHoyMisContratistas = response.data.rows[0].hoy;
                $scope.visitasAyerMisContratistas = response.data.rows[0].ayer;
                $scope.visitasMesMisContratistas = response.data.rows[0].mes;
                $scope.visitasTotalMisContratistas = response.data.rows[0].hoy + response.data.rows[0].ayer + response.data.rows[0].mes;                
            }
        });
    }

    $scope.mipersonal = true;
    $scope.misvisitantes = false;
    $scope.miscontratistas = false;

    $scope.showMiPersonal = function(){
        $scope.background = 'mipersonal';
        $scope.mipersonal = true;
        $scope.misvisitantes = false;
        $scope.miscontratistas = false;
    }

    $scope.showMisVisitantes = function(){
        $scope.background = 'misvisitantes';
        $scope.mipersonal = false;
        $scope.misvisitantes = true;
        $scope.miscontratistas = false;
    }

    $scope.showMisContratistas = function(){
        $scope.background = 'miscontratistas';
        $scope.mipersonal = false;
        $scope.misvisitantes = false;
        $scope.miscontratistas = true;
    }

    $scope.getDataMiPersonal({ uid : pathuid });
    $scope.getDataMisVisitantes({uid : pathuid});
    $scope.getDataMisContratistas({uid : pathuid});

}]);