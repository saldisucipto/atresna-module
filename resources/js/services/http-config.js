import axios from "axios";
export default axios.create({
    baseURL: "http://cms.test/api/",
    headers: {
        "Content-type": "application/json",
    },
});
