
import FlexibleWidthFieldtype from './FlexibleWidthFieldtype.vue'

class FieldtypesProvider {
  constructor() {
    this.bootExtensions()
  }

  bootExtensions() {
    Statamic.$components.register('flexible_width-fieldtype', FlexibleWidthFieldtype);
    return this
  }
}

export default FieldtypesProvider
