import { FLASH_ADD, FLASH_DELETE } from './action-type';
import query from "axios/index";

export default function flashMessage(data){
  switch (data.action){
    case "add": return this.addFlashMessage(data);
    case "delete": return this.deleteFlashMessage(data);
  };
}

export function addFlashMessage(data) {
  return {
    type: data.type,
    text: data.text,
  }
}

export function deleteFlashMessage(data) {
  return {
    type: FLASH_DELETE,
    payload: data.id,
  }
}
