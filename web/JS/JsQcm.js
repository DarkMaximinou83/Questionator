var app = angular.module('myApp', ['ngTouch','ngAnimate']);


app.controller('MyCtrl', function ($scope) {
    $scope.model = {
        left:  0,
        right: 0,
        click: 0
    };
    $scope.lool=[];

    $scope.slide = 1;


    $scope.swipeLeft = function (compt) {
        $scope.model.left += 1;
        if(($scope.slide)<compt) {
            $scope.slide++;
        }


    };
    $scope.swipeRight = function () {
        $scope.model.right += 1;
        if(($scope.slide)>1) {
            $scope.slide--;
        }
    };





});



$(".button-collapse").sideNav();


var lool=[];
var xhr = new XMLHttpRequest();


function add(response)  {
    lool.push(response);

}

function save(response)  {


    xhr.open('POST', '/validQuestion');

    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.send('response[]=' + response);
}







