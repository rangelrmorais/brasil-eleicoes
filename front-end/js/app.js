angular.module("brasilEleicoes", ["satellizer"])

.config(["$authProvider", function($authProvider) {

  $authProvider.facebook({
    clientId: '106178243154175',
    name: 'facebook',
    url: 'http://localhost:3000/auth/facebook',
    authorizationEndpoint: 'https://www.facebook.com/v2.5/dialog/oauth',
    redirectUri: window.location.origin + '/',
    requiredUrlParams: ['display', 'scope'],
    scope: ['email'],
    scopeDelimiter: ',',
    display: 'popup',
    type: '2.0',
    popupOptions: { width: 580, height: 400 }
  });

}])

.controller("FormularioCtrl", ["$http", "$scope", function($http, $scope) {

  $scope.cidades = [];
  $scope.candidatos = [];

  $http.get("dados/cidades.json").then(function(result) {
    $scope.cidades = result.data;
  });

  $http.get("dados/candidatos.json").then(function(result) {
    $scope.candidatos = result.data;
  });

  $scope.escolherCidade = function(cidade) {
    $scope.currentUser.cidade = cidade;
  }

  $scope.escolherCandidato = function(candidato) {
    $scope.currentUser.candidato = candidato;
  }

}])

.controller("AuthCtrl", ["$auth", "$scope", function($auth, $scope) {

  $scope.currentUser = {};

  $scope.authenticate = function(provider) {
    $auth.authenticate(provider);
  };

  $scope.isAuthenticated = function() {

    if($auth.isAuthenticated() && !$scope.currentUser.displayName) {
      $scope.currentUser = $auth.getPayload().data;
    }

    return $auth.isAuthenticated();
  };

  $scope.logout = function() {
    $auth.logout();
  }

}])