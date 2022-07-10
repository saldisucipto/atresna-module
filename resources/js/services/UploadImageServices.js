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
    remove_array_value(array, value) {
        var index = array.indexOf(value);
        if (index >= 0) {
            array.splice(index, 1);
            this.reindex_array(array);
        }
    }
    reindex_array(array) {
        var result = [];
        for (var key in array) {
            result.push(array[key]);
        }
        return result;
    }
}

export default new uploadImagesServices();
