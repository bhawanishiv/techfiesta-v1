app.service('userService', ['$http', '$log', function ($http, $log) {
        return {
            getAccountDetail: (data, callBack) => {
                var fd = new FormData();
                for (var key in data) {
                    fd.append(key, data[key]);
                }
                $http.post(account + 'getAccountDetail', fd, {
                    transformRequest: angular.identity,
                    headers: {'Content-Type': undefined}
                })
                        .then((res) => {
                            callBack(res);
                        })
                        , ((err) => {
                            $log.error(err);
                        });
            },
            createUser: (data, callBack) => {
                var fd = new FormData();
                for (var key in data) {
                    fd.append(key, data[key]);
                }
                $http.post(account + 'createUser', fd, {
                    transformRequest: angular.identity,
                    headers: {'Content-Type': undefined}
                })
                        .then((res) => {
                            callBack(res);
                        })
                        , ((err) => {
                            $log.error(err);
                        });
            },
            getUser: (callBack) => {
                $http.get(account + 'getUsers')
                        .then((res) => {
                            callBack(res);
                        })
                        , ((err) => {
                            $log.error(err);
                        });
            },
            googleSignIn: (data, callBack) => {
                var fd = new FormData();
                for (var key in data) {
                    fd.append(key, data[key]);
                }
                $http.post(account + 'googleSignIn', fd, {
                    transformRequest: angular.identity,
                    headers: {'Content-Type': undefined}
                })
                        .then((res) => {
                            callBack(res);
                        })
                        , ((err) => {
                            $log.error(err);
                        });
            }
            ,
            changeEmail: (data, callBack) => {
                var fd = new FormData();
                for (var key in data) {
                    fd.append(key, data[key]);
                }
                $http.post(account + 'changeEmail', fd, {
                    transformRequest: angular.identity,
                    headers: {'Content-Type': undefined}
                })
                        .then((res) => {
                            callBack(res);
                        })
                        , ((err) => {
                            $log.error(err);
                        });
            },
            changeProfileImage: (data, callBack) => {
                var fd = new FormData();
                for (var key in data) {
                    fd.append(key, data[key]);
                }
                $http.post(account + 'changeProfileImage', fd, {
                    transformRequest: angular.identity,
                    headers: {'Content-Type': undefined}
                })
                        .then((res) => {
                            callBack(res);
                        })
                        , ((err) => {
                            $log.error(err);
                        });
            },
            changePassword: (data, callBack) => {
                var fd = new FormData();
                for (var key in data) {
                    fd.append(key, data[key]);
                }
                $http.post(account + 'changePassword', fd, {
                    transformRequest: angular.identity,
                    headers: {'Content-Type': undefined}
                })
                        .then((res) => {
                            callBack(res);
                        })
                        , ((err) => {
                            $log.error(err);
                        });
            },
            postLogin: (data, callBack) => {
                var fd = new FormData();
                for (var key in data) {
                    fd.append(key, data[key]);
                }
                $http.post(account + 'postLogin', fd, {
                    transformRequest: angular.identity,
                    headers: {'Content-Type': undefined}
                })
                        .then((res) => {
                            callBack(res);
                        })
                        , ((err) => {
                            $log.error(err);
                        });
            },
            getAcademics: (callBack) => {
                $http.get(account + 'getAcademics')
                        .then((res) => {
                            callBack(res);
                        })
                        , ((err) => {
                            $log.error(err);
                        });
            },
            getPayments: (callBack) => {
                $http.get(account + 'getPayments')
                        .then((res) => {
                            callBack(res);
                        })
                        , ((err) => {
                            $log.error(err);
                        });
            },
            getAccomodations: (callBack) => {
                $http.get(account + 'getAccomodations')
                        .then((res) => {
                            callBack(res);
                        })
                        , ((err) => {
                            $log.error(err);
                        });
            },

            postAcademic: (data, callBack) => {
                var fd = new FormData();
                for (var key in data) {
                    fd.append(key, data[key]);
                }
                $http.post(account + 'postAcademic', fd, {
                    transformRequest: angular.identity,
                    headers: {'Content-Type': undefined}
                })
                        .then((res) => {
                            callBack(res);
                        })
                        , ((err) => {
                            $log.error(err);
                        });
            },
            getInstitutes: (callBack) => {
                $http.get(account + 'getInstitutes')
                        .then((res) => {
                            callBack(res);
                        })
                        , ((err) => {
                            $log.error(err);
                        });
            },
            getParticipation: (callBack) => {
                $http.get(account + 'getParticipation')
                        .then((res) => {
                            callBack(res);
                        })
                        , ((err) => {
                            $log.error(err);
                        });
            },
            postPayment: (data, callBack) => {
                var fd = new FormData();
                for (var key in data) {
                    fd.append(key, data[key]);
                }
                $http.post(account + 'postPayment', fd, {
                    transformRequest: angular.identity,
                    headers: {'Content-Type': undefined}
                })
                        .then((res) => {
                            callBack(res);
                        })
                        , ((err) => {
                            $log.error(err);
                        });
            },
        };
    }]);


app.service('eventService', ['$http', '$log', function ($http, $log) {
        return{
            getTeamMembers: (callBack) => {
                $http.get(dashboard + 'getTeamMembers')
                        .then((res) => {
                            callBack(res);
                        })
                        , ((err) => {
                            $log.error(err);
                        });
            },
            getEvents: (callBack) => {
                $http.get(events + 'getEvents')
                        .then((res) => {
                            callBack(res);
                        })
                        , ((err) => {
                            $log.error(err);
                        });
            },
            getSchoolEvents: (callBack) => {
                $http.get(events + 'getSchoolEvents')
                        .then((res) => {
                            callBack(res);
                        })
                        , ((err) => {
                            $log.error(err);
                        });
            },
            getDepartments: (callBack) => {
                $http.get(events + 'getDepartments')
                        .then((res) => {
                            callBack(res);
                        })
                        , ((err) => {
                            $log.error(err);
                        });
            },
            postEvent: (data, callBack) => {
                var fd = new FormData();
                for (var key in data) {
                    fd.append(key, data[key]);
                }
                $http.post(dashboard + 'postEvent', fd, {
                    transformRequest: angular.identity,
                    headers: {'Content-Type': undefined}
                })
                        .then((res) => {
                            callBack(res);
                        })
                        , ((err) => {
                            $log.error(err);
                        });
            },           
            postEventVenue: (data, callBack) => {
                var fd = new FormData();
                for (var key in data) {
                    fd.append(key, data[key]);
                }
                $http.post(dashboard + 'postEventVenue', fd, {
                    transformRequest: angular.identity,
                    headers: {'Content-Type': undefined}
                })
                        .then((res) => {
                            callBack(res);
                        })
                        , ((err) => {
                            $log.error(err);
                        });
            },
            postEventDate: (data, callBack) => {
                var fd = new FormData();
                for (var key in data) {
                    fd.append(key, data[key]);
                }
                $http.post(dashboard + 'postEventDate', fd, {
                    transformRequest: angular.identity,
                    headers: {'Content-Type': undefined}
                })
                        .then((res) => {
                            callBack(res);
                        })
                        , ((err) => {
                            $log.error(err);
                        });
            },
            postParticipation: (data, callBack) => {
                var fd = new FormData();
                for (var key in data) {
                    fd.append(key, data[key]);
                }
                $http.post(events + 'postParticipation', fd, {
                    transformRequest: angular.identity,
                    headers: {'Content-Type': undefined}
                })
                        .then((res) => {
                            callBack(res);
                        })
                        , ((err) => {
                            $log.error(err);
                        });
            },
            getParticipation: (callBack) => {
                $http.get(events + 'getParticipation')
                        .then((res) => {
                            callBack(res);
                        })
                        , ((err) => {
                            $log.error(err);
                        });
            },
        };

    }]);
app.service('messageService', ['$http', '$log', function ($http, $log) {
        return {
            postMessage: (data, callBack) => {
                var fd = new FormData();
                for (var key in data) {
                    fd.append(key, data[key]);
                }
                $http.post(support + 'postMessage', fd, {
                    transformRequest: angular.identity,
                    headers: {'Content-Type': undefined}
                })
                        .then((res) => {
                            callBack(res);
                        })
                        , ((err) => {
                            $log.error(err);
                        });
            }
        };
    }]);
app.service('hospitalityService', ['$http', '$log', function ($http, $log) {
        return {
            postAccomodation: (data, callBack) => {
                var fd = new FormData();
                for (var key in data) {
                    fd.append(key, data[key]);
                }
                $http.post(hospitality + 'postAccomodation', fd, {
                    transformRequest: angular.identity,
                    headers: {'Content-Type': undefined}
                })
                        .then((res) => {
                            callBack(res);
                        })
                        , ((err) => {
                            $log.error(err);
                        });
            },
            getAccomodations: (callBack) => {
                $http.get(hospitality + 'geAccomodation')
                        .then((res) => {
                            callBack(res);
                        })
                        , ((err) => {
                            $log.error(err);
                        });
            },
        };
    }]);

app.service('dashboardService', ['$http', '$log', function ($http, $log) {

        return {
            getMessages: (callBack) => {
                $http.get(dashboard + 'getMessages')
                        .then((res) => {
                            callBack(res);
                        })
                        , ((err) => {
                            $log.error(err);
                        });
            },
            getPayments: (callBack) => {
                $http.get(dashboard + 'getPayments')
                        .then((res) => {
                            callBack(res);
                        })
                        , ((err) => {
                            $log.error(err);
                        });
            },
            getHospitality: (callBack) => {
                $http.get(dashboard + 'getHospitality')
                        .then((res) => {
                            callBack(res);
                        })
                        , ((err) => {
                            $log.error(err);
                        });
            },
            getUsers: (callBack) => {
                $http.get(dashboard + 'getUsers')
                        .then((res) => {
                            callBack(res);
                        })
                        , ((err) => {
                            $log.error(err);
                        });
            },
            getInstitutes: (callBack) => {
                $http.get(dashboard + 'getInstitutes')
                        .then((res) => {
                            callBack(res);
                        })
                        , ((err) => {
                            $log.error(err);
                        });
            },
            getTeamMembers: (callBack) => {
                $http.get(dashboard + 'getTeamMembers')
                        .then((res) => {
                            callBack(res);
                        })
                        , ((err) => {
                            $log.error(err);
                        });
            },
            getParticipation: (callBack) => {
                $http.get(dashboard + 'getParticipation')
                        .then((res) => {
                            callBack(res);
                        })
                        , ((err) => {
                            $log.error(err);
                        });
            },
            generateDetailsInPDF: (data, callBack) => {
                var fd = new FormData();
                for (var key in data) {
                    fd.append(key, data[key]);
                }
                $http.post(dashboard + 'generateDetailsInPDF', fd, {
                    transformRequest: angular.identity,
                    headers: {'Content-Type': undefined}
                })
                        .then((res) => {
                            callBack(res);
                        })
                        , ((err) => {
                            $log.error(err);
                        });
            },
            postTeamMember: (data, callBack) => {
                var fd = new FormData();
                for (var key in data) {
                    fd.append(key, data[key]);
                }
                $http.post(dashboard + 'postTeamMember', fd, {
                    transformRequest: angular.identity,
                    headers: {'Content-Type': undefined}
                })
                        .then((res) => {
                            callBack(res);
                        })
                        , ((err) => {
                            $log.error(err);
                        });
            },
            postEvent: (data, callBack) => {
                var fd = new FormData();
                for (var key in data) {
                    fd.append(key, data[key]);
                }
                $http.post(dashboard + 'postEvent', fd, {
                    transformRequest: angular.identity,
                    headers: {'Content-Type': undefined}
                })
                        .then((res) => {
                            callBack(res);
                        })
                        , ((err) => {
                            $log.error(err);
                        });
            },
            postSchoolEvent: (data, callBack) => {
                var fd = new FormData();
                for (var key in data) {
                    fd.append(key, data[key]);
                }
                $http.post(dashboard + 'postSchoolEvent', fd, {
                    transformRequest: angular.identity,
                    headers: {'Content-Type': undefined}
                })
                        .then((res) => {
                            callBack(res);
                        })
                        , ((err) => {
                            $log.error(err);
                        });
            },
            postDepartment: (data, callBack) => {
                var fd = new FormData();
                for (var key in data) {
                    fd.append(key, data[key]);
                }
                $http.post(dashboard + 'postDepartment', fd, {
                    transformRequest: angular.identity,
                    headers: {'Content-Type': undefined}
                })
                        .then((res) => {
                            callBack(res);
                        })
                        , ((err) => {
                            $log.error(err);
                        });
            },
            postInstitute: (data, callBack) => {
                var fd = new FormData();
                for (var key in data) {
                    fd.append(key, data[key]);
                }
                $http.post(dashboard + 'postInstitute', fd, {
                    transformRequest: angular.identity,
                    headers: {'Content-Type': undefined}
                })
                        .then((res) => {
                            callBack(res);
                        })
                        , ((err) => {
                            $log.error(err);
                        });
            },
            postEventDate: (data, callBack) => {
                var fd = new FormData();
                for (var key in data) {
                    fd.append(key, data[key]);
                }
                $http.post(dashboard + 'postEventDate', fd, {
                    transformRequest: angular.identity,
                    headers: {'Content-Type': undefined}
                })
                        .then((res) => {
                            callBack(res);
                        })
                        , ((err) => {
                            $log.error(err);
                        });
            },
            postEventRule: (data, callBack) => {
                var fd = new FormData();
                for (var key in data) {
                    fd.append(key, data[key]);
                }
                $http.post(dashboard + 'postEventRule', fd, {
                    transformRequest: angular.identity,
                    headers: {'Content-Type': undefined}
                })
                        .then((res) => {
                            callBack(res);
                        })
                        , ((err) => {
                            $log.error(err);
                        });
            },

            updateDepartment: (data, callBack) => {
                var fd = new FormData();
                for (var key in data) {
                    fd.append(key, data[key]);
                }
                $http.post(dashboard + 'updateDepartment', fd, {
                    transformRequest: angular.identity,
                    headers: {'Content-Type': undefined}
                })
                        .then((res) => {
                            callBack(res);
                        })
                        , ((err) => {
                            $log.error(err);
                        });
            },
            updateEvent: (data, callBack) => {
                var fd = new FormData();
                for (var key in data) {
                    fd.append(key, data[key]);
                }
                $http.post(dashboard + 'updateEvent', fd, {
                    transformRequest: angular.identity,
                    headers: {'Content-Type': undefined}
                })
                        .then((res) => {
                            callBack(res);
                        })
                        , ((err) => {
                            $log.error(err);
                        });
            },
            updateTeam: (data, callBack) => {
                var fd = new FormData();
                for (var key in data) {
                    fd.append(key, data[key]);
                }
                $http.post(dashboard + 'updateTeam', fd, {
                    transformRequest: angular.identity,
                    headers: {'Content-Type': undefined}
                })
                        .then((res) => {
                            callBack(res);
                        })
                        , ((err) => {
                            $log.error(err);
                        });
            },
            togglePaymentVerification: (data, callBack) => {
                var fd = new FormData();
                for (var key in data) {
                    fd.append(key, data[key]);
                }
                $http.post(dashboard + 'togglePaymentVerification', fd, {
                    transformRequest: angular.identity,
                    headers: {'Content-Type': undefined}
                })
                        .then((res) => {
                            callBack(res);
                        })
                        , ((err) => {
                            $log.error(err);
                        });
            },
            toggleAccomodationAllowance: (data, callBack) => {
                var fd = new FormData();
                for (var key in data) {
                    fd.append(key, data[key]);
                }
                $http.post(dashboard + 'toggleAccomodationAllowance', fd, {
                    transformRequest: angular.identity,
                    headers: {'Content-Type': undefined}
                })
                        .then((res) => {
                            callBack(res);
                        })
                        , ((err) => {
                            $log.error(err);
                        });
            },
            toggleUserType: (data, callBack) => {
                var fd = new FormData();
                for (var key in data) {
                    fd.append(key, data[key]);
                }
                $http.post(dashboard + 'toggleUserType', fd, {
                    transformRequest: angular.identity,
                    headers: {'Content-Type': undefined}
                })
                        .then((res) => {
                            callBack(res);
                        })
                        , ((err) => {
                            $log.error(err);
                        });
            },
            toggleUserPermission: (data, callBack) => {
                var fd = new FormData();
                for (var key in data) {
                    fd.append(key, data[key]);
                }
                $http.post(dashboard + 'toggleUserPermission', fd, {
                    transformRequest: angular.identity,
                    headers: {'Content-Type': undefined}
                })
                        .then((res) => {
                            callBack(res);
                        })
                        , ((err) => {
                            $log.error(err);
                        });
            },
        };
    }]);

//var fd = new FormData();
//for (var key in data) {
//    fd.append(key, data[key]);
//}
//$http.post(account + 'getAccountDetail', fd, {
//    transformRequest: angular.identity,
//    headers: {'Content-Type': undefined}
//})
//        .then((res) => {
//            callBack(res);
//        })
//        , ((err) => {
//            $log.error(err);
//        });
//};