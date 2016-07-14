angular.module("brasilEleicoes", ["satellizer"])

.config(["$authProvider", function($authProvider) {

  $authProvider.facebook({
    clientId: '106178243154175',
    url: 'http://brasileleicoes.com.br:3010/auth/facebook'
  });

}])

.filter('escape', function() {
  return window.encodeURIComponent;
})

.filter('orderObjectBy', function() {
  return function(items, field, reverse) {
    var filtered = [];
    angular.forEach(items, function(item) {
      filtered.push(item);
    });
    filtered.sort(function (a, b) {
      return (a[field] > b[field] ? 1 : -1);
    });
    if(reverse) filtered.reverse();
    return filtered;
  };
})

.controller("FormularioCtrl", ["$http", "$scope", "$location", function($http, $scope, $location) {

  // Variáveis
  $scope.cidades = [];
  $scope.candidatos = [];
  $scope.ranking = {};

  // Helper
  function getParameterByName(name) {
      name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
      var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
          results = regex.exec(location.search);
      return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
  }

  // XHR
  $http.get("http://brasileleicoes.com.br:3010/voto/validar").then(function(result) {
    if(result.data.message == "ja_votou") {
      alert("Você votou no " + result.data.voto.candidato.nome + "!");

      $scope.currentUser.cidade = result.data.voto.cidade;
      $scope.currentUser.candidato = result.data.voto.candidato;

      $scope.atualizarRanking();
    }
  });

  // XHR
  $http.get("dados/cidades.json").then(function(result) {
    $scope.cidades = result.data;
  });

  // XHR
  $http.get("dados/candidatos.json").then(function(result) {
    $scope.candidatos = result.data;
  });

  // Helpers
  $scope.escolherCidade = function(cidade) {
    $scope.currentUser.cidade = cidade;
  }

  // Helpers
  $scope.atualizarRanking = function() {
    $http.get("http://brasileleicoes.com.br:3010/voto/ranking?cidade=" + $scope.currentUser.cidade)
      .then(function(result) {

        angular.forEach(result.data, function(value, key) {

          if($scope.ranking[value.candidato.nome]) {
            $scope.ranking[value.candidato.nome].total = $scope.ranking[value.candidato.nome].total + 1;
          } else {
            value.candidato.total = 1;
            $scope.ranking[value.candidato.nome] = value.candidato;
          }
        });

      });
  }

  // Helpers
  $scope.escolherCandidato = function(candidato) {
    $scope.currentUser.candidato = candidato;

    $http.post("http://brasileleicoes.com.br:3010/voto/salvar", {
      user: $scope.currentUser,
      candidato: candidato
    }).then(function(result) {
      $scope.atualizarRanking();

      // alert("Voto computado com sucesso!");
    });
  }

  // Watches
  $scope.$watchCollection("currentUser", function(newValue) {
    if(newValue.displayName && getParameterByName('cidade')) {
      $scope.currentUser.cidade = getParameterByName('cidade');
    }
  });

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