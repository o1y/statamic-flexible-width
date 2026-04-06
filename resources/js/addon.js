import FlexibleWidthFieldtype from './fieldtypes/FlexibleWidthFieldtype.vue'

Statamic.booting(() => {
  Statamic.$components.register('flexible_width-fieldtype', FlexibleWidthFieldtype);
});
