import http from "./http-config";
class uploadImagesServices {
    upload(file) {
        // console.log("This Is Form Upload Images Class");
        // console.log(file);
        const config = {
            headers: {
                "Content-type": "multipart/form-data",
            },
        };
        let data = new FormData();
        data.append("files", file);
        // console.log(file);
        return http.post("/com-info/update", data, config);
    }
}

export default new uploadImagesServices();
