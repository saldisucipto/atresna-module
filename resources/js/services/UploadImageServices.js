import http from "./http-config";
class uploadImagesServices {
    upload(file) {
        console.log("This Is Form Upload Images Class");
        console.log(file);
        let data = new FormData();

        data.append("files", file);
        // console.log(file);
        return http.post("/com-info/update", data);
    }
}

export default new uploadImagesServices();
