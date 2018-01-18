import query from "axios";
import { AUTH, USER } from './action-type';
const prefix = "_auth/";
const action = "Dashboard action";

export default function authRequest (data){
  switch (data.action){
    case "auth": return this.getAuth(data);
    case "user": return this.getUser(data);
    case "logout": return this.logout();
  }

  console.log(action + " error: " + data.action + "' not found");
  return { errors: {}, isValid: false }
}

export function getAuth(data) {
  const url = prefix + "?";
  return{
    type: AUTH,
    payload: query.get(
      url +
      "query=" + data.query +
      "action=" + data.action +
      "apiKey=" + data.apiKey
    )
  };
}

export function getUser(data) {
  const url = prefix + "user?";
  return{
    type: USER,
    payload: query.get(
      url +
      "query=" + data.query +
      "action=" + data.action +
      "apiKey=" + data.apiKey
    )
  }
}

export function logout() {
  const url = "logout";
  return{
    type: USER,
    payload: query.post(
      url
      // "query=" + data.query +
      // "action=" + data.action +
      // "apiKey=" + data.apiKey
    )
  }
}