import http from "./http-config";
class UserInfoDataServices {
    getUserData() {
        return http.get("/user-info/users");
    }
    createUser(data) {
        const config = {
            headers: {
                "Content-type": "application/json",
            },
        };
        return http.post("/user-info/create", data, config);
    }
    showUserDetails(id) {
        const config = {
            headers: {
                "Content-type": "application/json",
            },
        };
        return http.get("/user-info/user/" + id);
    }
    editCompanyInfo(data) {
        const config = {
            headers: {
                "Content-type": "application/json",
            },
        };
        return http.post("/com-info/update", data, config);
    }
}
export default new UserInfoDataServices();
