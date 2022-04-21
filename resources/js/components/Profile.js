import React, { useState } from "react";
import ReactDOM from "react-dom";
import profiles from "../data/profiles";
function Profile(props) {
    const handleModal = () => {
        setModalopen((modalopen) => !modalopen);
    };
    const [modalopen, setModalopen] = useState(false);
    const [profile, setProfile] = useState(props.profile ?? null);
    return (
        <div className="profile-img-box mb-4 d-flex m-auto">
            <input type="hidden" name="profile" value={profile} />
            <div
                className="modal"
                tabIndex="-1"
                role="dialog"
                style={{ display: modalopen ? "grid" : "none" }}
            >
                <div
                    className="modal-dialog"
                    role="document"
                    style={{ width: "auto", maxWidth: "auto" }}
                >
                    <div className="modal-content">
                        <div className="modal-header">
                            <h5 className="modal-title">Modal title</h5>
                            <button
                                type="button"
                                className="close btn btn-info"
                                data-dismiss="modal"
                                aria-label="Close"
                                onClick={handleModal}
                            >
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div className="modal-body">
                            {profiles.map((e, index) => (
                                <img
                                    key={index}
                                    onClick={() => setProfile(e.src)}
                                    className={`small-profile round c-pointer ${
                                        profile === e.src && "choosen"
                                    }`}
                                    src={`${e.src}`}
                                    alt="Image"
                                />
                            ))}
                        </div>
                    </div>
                </div>
            </div>
            <img
                onClick={handleModal}
                className="h-100 w-100 round c-pointer text-light"
                src={profile}
                alt="Choose avatar"
            />
        </div>
    );
}

export default Profile;

if (document.getElementById("profile-img")) {
    const element = document.getElementById("profile-img");
    const props = Object.assign({}, element.dataset);
    ReactDOM.render(
        <Profile {...props} />,
        document.getElementById("profile-img")
    );
}
