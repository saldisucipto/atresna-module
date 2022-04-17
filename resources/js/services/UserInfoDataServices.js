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
        return http.get("/user-info/user/" + id);
    }
    editUserInfo(data, id) {
        const config = {
            headers: {
                "Content-type": "application/json",
            },
        };
        return http.put("/user-info/update/" + id, data, config);
    }
}
export default new UserInfoDataServices();
