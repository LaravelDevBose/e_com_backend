class AppStorage {
    storeToken(token){
        localStorage.setItem('token', token);
    }

    storeUser(user){
        localStorage.setItem('user', user);
        // this.storeFullName(user.full_name);
    }
    storeFullName(fullName){
        localStorage.setItem('full_name', fullName);
    }

    storeWhoIs(whoIs){
        localStorage.setItem('whoIs', whoIs);
    }

    storeUserId(userId){
        localStorage.setItem('userId', userId);
    }

    storeUserInfo(userInfo){
        let jsonData = JSON.parse(userInfo.user);
        this.storeToken(userInfo.token);
        this.storeUser(userInfo.user);
        this.storeFullName(jsonData.full_name);
        this.storeWhoIs(userInfo.whoIs);
        this.storeUserId(jsonData.user_id);
    }

    storageClear(){
        localStorage.removeItem('token');
        localStorage.removeItem('user');
        localStorage.removeItem('whoIs');
        localStorage.removeItem('full_name');
        localStorage.removeItem('userId');
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
    getUserId(){
        return localStorage.getItem('userId');
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

    storeLangInfo(lang){
        localStorage.setItem('lang', lang);
    }
}

export default AppStorage = new AppStorage();
