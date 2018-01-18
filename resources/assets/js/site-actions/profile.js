import query from "axios";
import { PROFILE, PROFILE_DETAILS, PROFILE_SETTINGS } from './action-type';
const prefix = "profile/";
const action = "Profile action";

export default function profileRequest (data){
  switch (data.action){
    case "profile": return this.profileIndex(data);
    case "details": return this.profileDetails(data);
    case "settings": return this.profileSettings(data);
  }

  console.log(action + " error: '" + data.action + "' not found");
  return { errors: {}, isValid: false }
}

export function profileIndex(data) {
    return{
        type: PROFILE,
        payload: query.get(prefix + "user-profile", data)
    }
}

export function profileDetails(data) {
  return{
    type: PROFILE_DETAILS,
    payload: query.get(prefix + "user-profile-details", data)
  }
}

export function profileSettings(data) {
  return{
    type: PROFILE_SETTINGS,
    payload: query.post(prefix + "user-profile-settings", data)
  }
}
