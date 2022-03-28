import axios from "axios";
export default axios.create({
    baseURL: "http://atresna-module.test/api/",
    headers: {
        "Content-type": "application/json",
    },
});
