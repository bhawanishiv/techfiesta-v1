app.factory('webFactory', ['$http', '$log', function ($http, $log) {
        var obj = {};
        obj.processOTP = (data, callBack) => {
            var fd = new FormData();
            for (var key in data) {
                fd.append(key, data[key]);
            }
            $http.post(library + 'processOTP', fd, {
                transformRequest: angular.identity,
                headers: {'Content-Type': undefined}
            })
                    .then((res) => {
                        callBack(res);
                    }),
                    ((err) => {
                        $log.error(err);
                    });
        };

        obj.sendEmail = (data, callBack) => {
            var fd = new FormData();
            for (var key in data) {
                fd.append(key, data[key]);
            }
            $http.post(library + 'sendEMailDirect', fd,
                    {
                        transformRequest: angular.identity,
                        headers: {'Content-Type': undefined}
                    })
                    .then((res) => {
                        callBack(res);
                    }),
                    ((err) => {
                        $log.error(err);
                    });
        };
        obj.setSession = (data, callBack) => {
            var fd = new FormData();
            for (var key in data) {
                fd.append(key, data[key]);
            }
            $http.post(library + 'setSession', fd,
                    {
                        transformRequest: angular.identity,
                        headers: {'Content-Type': undefined}
                    })
                    .then((res) => {
                        callBack(res);
                    }),
                    ((err) => {
                        $log.error(err);
                    });
        };

        obj.getWebContent = (callBack) => {
            $http.get(library + 'getWebContent')
                    .then((res) => {
                        callBack(res.data.data);
                    })
                    , ((err) => {
                        $log.error(err);
                    });
        };

        obj.getLanguage = function (callBack) {
            $http.get(library + 'getLanguage')
                    .then((res) => {
                        callBack(res.data.data);
                    })
                    , ((err) => {
                        $log.error(err);
                    });
        };
        obj.setLanguage = function (data, callBack) {

            var fd = new FormData();
            for (var key in data) {
                fd.append(key, data[key]);
            }
            return $http.post(library + 'setLanguage', fd, {
                transformRequest: angular.identity,
                headers: {'Content-Type': undefined}
            })
                    .then((res) => {
                        callBack(res.data.data);
                    })
                    , ((err) => {
                        $log.error(err);
                    });

        };
        obj.pattern = [
            {type: 'email',
                pattern: new RegExp("[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?"),
                remarks: 'We get a more practical implementation of RFC 2822 if we omit the syntax using double quotes and square brackets. It will still match 99.99% of all email addresses in actual use today.'
            },
            {
                type: 'password',
                pattern: new RegExp("^(((?=.*[a-z])(?=.*[A-Z]))|((?=.*[a-z])(?=.*[0-9]))|((?=.*[A-Z])(?=.*[0-9])))(?=.{6,})"),
                remarks: ' it contains six characters or more and has at least one lowercase and one uppercase alphabetical character or has at least one lowercase and one numeric character or has at least one uppercase and one numeric character. We???ve chosen to leave special characters out of this one.'}
        ];
        return obj;
    }]);

