import query from "axios";
import { PROFILE } from './action-type';
const prefix = "settings/";
const action = "Settings action";

export default function settingsRequest (data){
  switch (data.action){
    case "settings": return this.SettingsIndex(data);
  }

  console.log(action + " error: '" + data.action + "' not found");
  return { errors: {}, isValid: false }
}

export function SettingsIndex(data) {
  return{
    type: PROFILE,
    payload: query.get(prefix + "user-profile", data)
  }
}