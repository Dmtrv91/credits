export default {
    name: "Storage",
    get(key, jsoned = false) {
        if (jsoned) {
            return JSON.parse(window.localStorage.getItem(key));
        } else {
            return window.localStorage.getItem(key)
;
        }
    },
    set(key, value) {
        window.localStorage.setItem(key, value);

        return true;
    },
    remove(key)
 {
        window.localStorage.removeItem(key)
;

        return true;
    }
}