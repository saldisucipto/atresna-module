import http from "./http-config";
class CompanyInfoDataServices {
    getCompanyInfo() {
        return http.get("/com-info/index");
    }
    editCompanyInfo(data) {
        return http.put("/com-info/update", data);
    }
}
export default new CompanyInfoDataServices();
