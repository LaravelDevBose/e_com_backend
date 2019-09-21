class AppStorage {
    storeToken(token){
        localStorage.setItem('token', token);
    }

    storeUser(user){
        localStorage.setItem('user', user);
    }
    storeFullName(fullName){
        localStorage.setItem('full_name', fullName);
    }

    storeWhoIs(whoIs){
        localStorage.setItem('whoIs', whoIs);
    }

    storeUserInfo(userInfo){
        this.storeToken(userInfo.token);
        this.storeUser(userInfo.user);
        this.storeWhoIs(userInfo.whoIs);
    }

    storageClear(){
        localStorage.removeItem('token');
        localStorage.removeItem('user');
        localStorage.removeItem('whoIs');
        localStorage.removeItem('full_name');
    }

    storageFullClear(){
        localStorage.clear();
    }

    getToken(){
        return localStorage.getItem('token');
    }

    getUser(){
        return localStorage.getItem('user');
    }

    getFullName(){
        return localStorage.getItem('full_name');
    }
    getWhoIs(){
        return localStorage.getItem('whoIs');
    }

    getUserInfo(){
        let token = this.getToken();
        let user = this.getUser();
        let userInfo={};
        return userInfo={
            token: token,
            user: user,
        };
    }
}

export default AppStorage = new AppStorage();
