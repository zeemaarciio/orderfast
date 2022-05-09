function produtosController($scope){
	var produtos=[
		{nome: 'Monitor', preco: '15.50', data: "1449599353000"},
		{nome: 'Teclado', preco: '150.00', data: "1449599353000"},
		{nome: 'Placa de Video', preco: '1550.00', data: "1449599353000"},
		{nome: 'Placa de Video 3d', preco: '1550.00', data: "1449599353000"},
		{nome: 'Mouse Optico', preco: '15.50', data: "1449599353000"},
		{nome: 'HD Externo 500GB', preco: '150.00', data: "1449599353000"},
		{nome: 'MousePad', preco: '50.00', data: "1449599353000"},
		{nome: 'Memoria Ram 8GB', preco: '150.00', data: "1449599353000"}
	];
	$scope.produtos = produtos;
}

/*mainApp.controller("produtosController", function($scope) {
	var produtos=[
		{nome: 'Monitor', preco: '15.50', data: "1449599353000"},
		{nome: 'Teclado', preco: '150.00', data: "1449599353000"},
		{nome: 'Placa de Video', preco: '1550.00', data: "1449599353000"},
		{nome: 'Placa de Video 3d', preco: '1550.00', data: "1449599353000"},
		{nome: 'Mouse Optico', preco: '15.50', data: "1449599353000"},
		{nome: 'HD Externo 500GB', preco: '150.00', data: "1449599353000"},
		{nome: 'MousePad', preco: '50.00', data: "1449599353000"},
		{nome: 'Memoria Ram 8GB', preco: '150.00', data: "1449599353000"}
	];
	$scope.produtos = produtos;
});
*/

/*var mainApp = angular.module("mainApp", []);

mainApp.controller("produtosController", function($scope) {

	var produtos=[
		{id:1,nome: 'Monitor', preco: '15.50', data: "1449599353000"},
		{id:2,nome: 'Teclado', preco: '150.00', data: "1449599353000"},
		{id:3,nome: 'Placa de Video', preco: '1550.00', data: "1449599353000"},
		{id:4,nome: 'Placa de Video 3d', preco: '1550.00', data: "1449599353000"},
		{id:5,nome: 'Mouse Optico', preco: '15.50', data: "1449599353000"},
		{id:6,nome: 'HD Externo 500GB', preco: '150.00', data: "1449599353000"},
		{id:7,nome: 'MousePad', preco: '50.00', data: "1449599353000"},
		{id:8,nome: 'Memoria Ram 8GB', preco: '150.00', data: "1449599353000"}
	];
	$scope.produtos = produtos;


	//Deletar
	$scope.deletar = function(index){
		var indexof = $scope.produtos.indexOf(index);
		produtos.splice(indexof,1);//splice é o nome do método usado para deletar
	}

	//cadastrar
	$scope.add = function(){
		//unshift
		$scope.produto.data = '1449599353000';
		produtos.unshift($scope.produto);
		console.log(produtos);
	}



});

mainApp.filter('capitalize', function(){
	return function(input, scope){
		input = input.toLowerCase();
		return input.substr(0,1).toUpperCase()+input.substr(1);
	}
});*/