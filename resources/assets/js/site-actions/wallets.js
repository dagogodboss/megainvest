import query from "axios";
import {AUTH, WALLETS, WALLETS_ACTION} from './action-type';
const prefix = "wallets";
const action = "Wallets action";

export default function walletsRequst (data){
  switch (data.action){
    case "wallets": return this.walletsIndex(data);
    case "wallets-post": return this.walletsAction(data);
    // case "settings": return this.profileSettings(data);
  }

  console.log(action + " error: '/" + data.action + "' not found in ");
  return { errors: {}, isValid: false }
}

export function walletsIndex(data) {
  const url = prefix + "user-wallets?";
  return{
    type: WALLETS,
    payload: query.get(
      url +
      "query=" + data.query +
      "action=" + data.action +
      "apiKey=" + data.apiKey
    )
  };
}

export function walletsAction(data) {
  return{
    type: WALLETS_ACTION,
    payload: query.post("/user-profile-details", data)
  }
}
