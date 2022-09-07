//app.provider('languageService', function () {
//
//    var webContent = null;
//
//    this.config = function () {
//        webContent = 'dj';
////        $http.get(index + 'getWebContent')
////                .then((res) => {
////                    webContent = res.data.data;
////                }),
////                ((err) => {
////                    $log.error(err);
////                });
//    };
//
//    this.$get = function () {
//        var provider = {};
//
//        provider.getWebContent = function () {
//            return webContent;
//        };
//        provider.getLanguage = function (callBack) {
//            var res = 'ssd';
//            callBack(res);
////                $http.get(index + 'getLanguage')
////                        .then((res) => {
////                            callBack(res.data.data);
////                        }),
////                        ((err) => {
////                            $log.error(err);
////                        });
//        };
//        provider.setLanguage = function (data) {
//            console.log(data);
////            var fd = new FormData();
////            for (var key in data) {
////                fd.append(key, data[key]);
////            }
////            $http.post(index + 'setLanguage', fd, {
////                transformRequest: angular.identity,
////                headers: {'Content-Type': undefined}
////            })
////                    .then((res) => {
////                        webContent = res.data.data;
////                    }),
////                    ((err) => {
////                        $log.error(err);
////                    });
//
//        };
////
//        return provider;
//    };
//});
//
//app.config(['languageServiceProvider','$http', function (languageServiceProvider, $http) {
//        languageServiceProvider.config(function());
//        
//    }]);