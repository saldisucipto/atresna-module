function strLimitTitle(dataTitle) {
    if (dataTitle.length <= 25) {
        return dataTitle;
    } else {
        return dataTitle.slice(0, 20) + "...";
    }
}

export { strLimitTitle };
