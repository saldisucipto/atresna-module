import http from "./http-config";
class CompanyInfoDataServices {
    getCompanyInfo() {
        return http.get("/com-info/index");
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
export default new CompanyInfoDataServices();
