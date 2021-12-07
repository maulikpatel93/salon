import { useTranslation } from 'react-i18next';

const Language = () => {
    const { i18n } = useTranslation();

    const changeLanguage = (lng) => {
        i18n.changeLanguage(lng);
    };

    return (
        <div className="App">
            <div className="App-header">
                <img src={logo} className="App-logo" alt="logo" />
                <button type="button" onClick={() => changeLanguage("fr")}>
                    fr
                </button>
                <button type="button" onClick={() => changeLanguage("en")}>
                    en
                </button>
            </div>
        </div>
    );
};

export default Language;
