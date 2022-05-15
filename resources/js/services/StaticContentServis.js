import http from "./http-config";
class StaticContentServis {
    getStaticCOntent() {
        return http.get("/static-content");
    }
    getStaticInfo(id) {
        return http.get("/static-content/info/" + id);
    }
    deleteStatic(id) {
        return http.delete("/static-content/delete/" + id);
    }
}
export default new StaticContentServis();
