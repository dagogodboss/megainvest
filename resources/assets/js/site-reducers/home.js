import { HOME,
    // HOME_FULFILLED,
    // HOME_REJECTED
} from '../site-actions/action-type';

const initialState = {
    response:{},
    fetching: false,
    fetched: false,
    error: null,
};
const HOME_REJECTED = HOME + "_REJECTED";
const HOME_FULFILLED = HOME + "_FULFILLED";

export default function reducer(state=initialState, action) {

    switch (action.type) {
        case HOME: {
            return {...state, fetching: true}
        }
        case HOME_FULFILLED: {
            return {...state, fetching: false, fetched: true, error: null, response: action.payload}
        }
        case HOME_REJECTED: {
            return {...state, fetching: false, error: action.payload}
        }
    }

    return state
}
