import http from "./http-config";
class StaticContentServis {
    getStaticCOntent() {
        return http.get("/static-content");
    }
    createStaticContent(data) {
        const config = {
            headers: {
                "Content-type": "multipart/form-data",
            },
        };
        return http
            .post("/static-content/create", data, config)
            .then((Response) => {
                console.log(Response.data);
            });
    }
    getStaticInfo(id) {
        return http.get("/static-content/info/" + id);
    }
}
export default new StaticContentServis();
